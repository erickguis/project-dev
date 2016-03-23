<?php

namespace Muserpol\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use DB;
use Auth;
use Session;
use Validator;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Muserpol\Afiliado;
use Muserpol\Aporte;
use Muserpol\Grado;
use Muserpol\Unidad;
use Muserpol\AporTasa;
use Muserpol\Categoria;
use Muserpol\Helper\Util;
use Carbon\Carbon;


class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importacion de Archivos';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Estimado Usuario escriba el nombre del archivo que desea importar, Gracias.');

        if ($this->confirm('Esta seguro de importar el archivo ' . $name . '.xlsx? [y|N]') && $name) {

            global $cAfiN, $cAfiU, $cApor, $progress;

            $this->info("Importando registros...\n");
            $progress = $this->output->createProgressBar();
            $progress->setFormat("%current%/%max% [%bar%] %percent:3s%%");

            ini_set('upload_max_filesize', '999M');
            ini_set('post_max_size', '999M');
            ini_set('max_execution_time', 36000);
            ini_set('max_input_time', 36000);
            ini_set("memory_limit","999M");
            set_time_limit(36000);

            $col = array('car', 'pat', 'mat', 'nom', 'nom2', 'apes', 'eciv', 'sex', 'nac', 'ing', 'mes', 'a_o', 'uni', 'desg', 
                            'niv', 'gra', 'item', 'sue', 'cat', 'est', 'carg', 'fro', 'ori', 'bseg', 'dfu', 'nat', 'lac', 'pre', 'sub', 'gan', 'afp', 'pag', 'nua', 'mus');
            
            Excel::selectSheetsByIndex(0)->filter('chunk')->select($col)->load('public/file_to_import/' . $name . '.xlsx')->chunk(500, function($results) {

                global $cAfiN, $cAfiU, $cApor, $progress;

                foreach ($results as $result) {

                    ini_set('upload_max_filesize', '500M');
                    ini_set('post_max_size', '500M');
                    ini_set('max_execution_time', 3600);
                    ini_set('max_input_time', 3600);
                    ini_set("memory_limit","500M");
                    set_time_limit(3600);
                    
                    $carnet = Util::zero($result->car);
                    $afiliado = Afiliado::where('ci', '=', $carnet)->first();

                    if ($afiliado) {
                        
                        if(Util::decimal($result->sue)<> 0){$afiliado->afi_state_id = 1;}
                        else{$afiliado->afi_state_id = 2;}
                        $afiliado->ap_esp = $result->apes;
                        $afiliado->est_civ = $result->eciv;
                        if($result->niv == '04' && $result->gra == '15'){$result->niv = '03';}
                        $afiliado->unidad_id = Unidad::select('id')->where('cod', $result->uni)->first()->id;
                        $afiliado->grado_id = Grado::select('id')->where('niv', $result->niv)->where('grad', $result->gra)->first()->id;
                        $afiliado->categoria_id = Categoria::select('id')->where('por', Util::calcCat(Util::decimal($result->cat),Util::decimal($result->sue)))->first()->id;
                        $afiliado->afp = Util::getAfp($result->afp);
                        $afiliado->nua = $result->nua;
                        $afiliado->save();
                        $cAfiU ++;
                        
                    }else{

                        $afiliado = new Afiliado;
                        $afiliado->user_id = 1;
                        
                        if(Util::decimal($result->sue)<> 0){$afiliado->afi_state_id = 1;}
                        else{$afiliado->afi_state_id = 2;}
                        $afiliado->ci = $carnet;
                        $afiliado->pat = $result->pat;
                        $afiliado->mat = $result->mat;
                        $afiliado->nom = $result->nom;
                        $afiliado->nom2 = $result->nom2;
                        $afiliado->ap_esp = $result->apes;
                        $afiliado->est_civ = $result->eciv;
                        $afiliado->sex = $result->sex;
                        $afiliado->unidad_id = Unidad::select('id')->where('cod', $result->uni)->first()->id;
                        if($result->niv == '04' && $result->gra == '15'){$result->niv = '03';}
                        $afiliado->grado_id = Grado::select('id')->where('niv', $result->niv)->where('grad', $result->gra)->first()->id;
                        $afiliado->categoria_id = Categoria::select('id')->where('por', Util::calcCat(Util::decimal($result->cat),Util::decimal($result->sue)))->first()->id;
                        $afiliado->afp = Util::getAfp($result->afp);
                        $afiliado->matri = Util::calcMatri($result->nac, $afiliado->pat, $afiliado->mat, $afiliado->nom, $afiliado->sex);
                        $afiliado->fech_nac = Util::date($result->nac);
                        $afiliado->fech_ing = Util::date($result->ing);
                        $afiliado->nua = $result->nua;
                        
                        $afiliado->save();
                        $cAfiN ++;
                    }
                    if (Util::decimal($result->sue)<> 0) {

                        $aporte = Aporte::where('gest', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())
                                            ->where('afiliado_id', '=', $afiliado->id)->first();

                        if (!$aporte) {

                            $aporte = new Aporte;
                            $aporte->user_id = 1;
                            $aporte->aporte_type_id = 1;
                            $aporte->afiliado_id = $afiliado->id;
                            $aporte->gest = Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1);
                            $aporte->unidad_id = Unidad::select('id')->where('cod', $result->uni)->first()->id;
                            $aporte->desg = $result->desg;
                            if($result->niv == '04' && $result->gra == '15'){$result->niv = '03';}
                            $aporte->grado_id = Grado::select('id')->where('niv', $result->niv)->where('grad', $result->gra)->first()->id;
                            $aporte->categoria_id = Categoria::select('id')->where('por', Util::calcCat(Util::decimal($result->cat),Util::decimal($result->sue)))->first()->id;
                            $aporte->item = $result->item;
                            $aporte->sue = Util::decimal($result->sue);
                            $aporte->b_ant = Util::decimal($result->cat);
                            $aporte->b_est = Util::decimal($result->est);
                            $aporte->b_car = Util::decimal($result->carg);
                            $aporte->b_fro = Util::decimal($result->fro);
                            $aporte->b_ori = Util::decimal($result->ori);
                            $aporte->b_seg = Util::decimal($result->bseg);
                            $aporte->dfu = $result->dfu;
                            $aporte->nat = $result->nat;
                            $aporte->lac = $result->lac;
                            $aporte->pre = $result->pre;
                            $aporte->sub = Util::decimal($result->sub);
                            $aporte->gan = Util::decimal($result->gan);
                            $aporte->pag = Util::decimal($result->pag);
                            $aporte->cot = (FLOAT)$aporte->sue + (FLOAT)$aporte->b_ant + (FLOAT)$aporte->b_est + (FLOAT)$aporte->b_car + (FLOAT)$aporte->b_fro + (FLOAT)$aporte->b_ori;
                            $aporte->mus = Util::decimal($result->mus);
                            if ($aporte->mus) {
                                $por_apor = AporTasa::where('gest', '=', Carbon::createFromDate(Util::formatYear($result->a_o), Util::zero($result->mes), 1)->toDateString())->first();
                                $aporte->fr = $aporte->mus * $por_apor->apor_fr_a / $por_apor->apor_a;
                                $aporte->sv = $aporte->mus * $por_apor->apor_sv_a / $por_apor->apor_a;
                            }
                            $aporte->save();
                            $cApor ++;
                        }
                        
                    }
                    $progress->advance();
                }

            });
            
            $cAfiT = $cAfiN + $cAfiU;
            $cAfiN = $cAfiN ? $cAfiN : "0";
            $cAfiU = $cAfiU ? $cAfiU : "0";
            $cAfiT = $cAfiT ? $cAfiT : "0";
            $cApor = $cApor ? $cApor : "0";

            $progress->finish();
        
            $this->info("\n\nSe realizaron: " . $cAfiN . " registros de Afiliados Nuevos, " . $cAfiU . " registros de Afiliados Actualizados, total " . $cAfiT . " y " . $cApor . " de Planillas\n");

        }

        // $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
