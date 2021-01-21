<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comuna;
use App\Models\Provincia;


class Comunas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $arica = Provincia::where('name', 'arica')->first();

      $comuna = new Comuna();
      $comuna->name = 'arica';
      $comuna->save();
      $arica->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'camarones';
      $comuna->save();
      $arica->comunas()->save($comuna);

      $parinacota = Provincia::where('name', 'parinacota')->first();

      $comuna = new Comuna();
      $comuna->name = 'general lagos';
      $comuna->save();
      $parinacota->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'putre';
      $comuna->save();
      $parinacota->comunas()->save($comuna);

      $iquique = Provincia::where('name', 'iquique')->first();

      $comuna = new Comuna();
      $comuna->name = 'alto hospicio';
      $comuna->save();
      $iquique->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'iquique';
      $comuna->save();
      $iquique->comunas()->save($comuna);

      $tamarugal = Provincia::where('name', 'el tamarugal')->first();

      $comuna = new Comuna();
      $comuna->name = 'camiña';
      $comuna->save();
      $tamarugal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'colchane';
      $comuna->save();
      $tamarugal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'huara';
      $comuna->save();
      $tamarugal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pica';
      $comuna->save();
      $tamarugal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pozo almonte';
      $comuna->save();
      $tamarugal->comunas()->save($comuna);

      $tocopilla = Provincia::where('name', 'tocopilla')->first();

      $comuna = new Comuna();
      $comuna->name = 'tocopilla';
      $comuna->save();
      $tocopilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'maría elena';
      $comuna->save();
      $tocopilla->comunas()->save($comuna);

      $loa = Provincia::where('name', 'el loa')->first();

      $comuna = new Comuna();
      $comuna->name = 'calama';
      $comuna->save();
      $loa->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'ollague';
      $comuna->save();
      $loa->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san pedro de atacama';
      $comuna->save();
      $loa->comunas()->save($comuna);

      $antofagasta = Provincia::where('name', 'antofagasta')->first();

      $comuna = new Comuna();
      $comuna->name = 'antofagasta';
      $comuna->save();
      $antofagasta->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'mejillones';
      $comuna->save();
      $antofagasta->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'sierra gorda';
      $comuna->save();
      $antofagasta->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'taltal';
      $comuna->save();
      $antofagasta->comunas()->save($comuna);

      $chañaral = Provincia::where('name', 'chañaral')->first();

      $comuna = new Comuna();
      $comuna->name = 'chañaral';
      $comuna->save();
      $chañaral->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'diego de almagro';
      $comuna->save();
      $chañaral->comunas()->save($comuna);

      $copiapó = Provincia::where('name', 'copiapó')->first();

      $comuna = new Comuna();
      $comuna->name = 'copiapó';
      $comuna->save();
      $copiapó->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'caldera';
      $comuna->save();
      $copiapó->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'tierra amarilla';
      $comuna->save();
      $copiapó->comunas()->save($comuna);

      $huasco = Provincia::where('name', 'huasco')->first();

      $comuna = new Comuna();
      $comuna->name = 'vallenar';
      $comuna->save();
      $huasco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'alto del carmen';
      $comuna->save();
      $huasco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'freirina';
      $comuna->save();
      $huasco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'huasco';
      $comuna->save();
      $huasco->comunas()->save($comuna);

      $elqui = Provincia::where('name', 'elqui')->first();

      $comuna = new Comuna();
      $comuna->name = 'la serena';
      $comuna->save();
      $elqui->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'coquimbo';
      $comuna->save();
      $elqui->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'andacollo';
      $comuna->save();
      $elqui->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'la higuera';
      $comuna->save();
      $elqui->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'paihuano';
      $comuna->save();
      $elqui->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'vicuña';
      $comuna->save();
      $elqui->comunas()->save($comuna);

      $limarí = Provincia::where('name', 'limarí')->first();

      $comuna = new Comuna();
      $comuna->name = 'ovalle';
      $comuna->save();
      $limarí->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'combarbalá';
      $comuna->save();
      $limarí->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'monte patria';
      $comuna->save();
      $limarí->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'punitaqui';
      $comuna->save();
      $limarí->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'río hurtado';
      $comuna->save();
      $limarí->comunas()->save($comuna);

      $choapa = Provincia::where('name', 'choapa')->first();

      $comuna = new Comuna();
      $comuna->name = 'illapel';
      $comuna->save();
      $choapa->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'canela';
      $comuna->save();
      $choapa->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'los vilos';
      $comuna->save();
      $choapa->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'salamanca';
      $comuna->save();
      $choapa->comunas()->save($comuna);

      $petorca = Provincia::where('name', 'petorca')->first();

      $comuna = new Comuna();
      $comuna->name = 'la ligua';
      $comuna->save();
      $petorca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cabildo';
      $comuna->save();
      $petorca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'zapallar';
      $comuna->save();
      $petorca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'papudo';
      $comuna->save();
      $petorca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'petorca';
      $comuna->save();
      $petorca->comunas()->save($comuna);

      $andes = Provincia::where('name', 'los andes')->first();

      $comuna = new Comuna();
      $comuna->name = 'los andes';
      $comuna->save();
      $andes->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san esteban';
      $comuna->save();
      $andes->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'calle larga';
      $comuna->save();
      $andes->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'rinconada';
      $comuna->save();
      $andes->comunas()->save($comuna);

      $aconcagua = Provincia::where('name', 'san felipe de aconcagua')->first();

      $comuna = new Comuna();
      $comuna->name = 'san felipe';
      $comuna->save();
      $aconcagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'llaillay';
      $comuna->save();
      $aconcagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'putaendo';
      $comuna->save();
      $aconcagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'santa maría';
      $comuna->save();
      $aconcagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'catemu';
      $comuna->save();
      $aconcagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'panquehue';
      $comuna->save();
      $aconcagua->comunas()->save($comuna);

      $quillota = Provincia::where('name', 'quillota')->first();

      $comuna = new Comuna();
      $comuna->name = 'quillota';
      $comuna->save();
      $quillota->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'la cruz';
      $comuna->save();
      $quillota->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'la calera';
      $comuna->save();
      $quillota->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'nogales';
      $comuna->save();
      $quillota->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'hijuelas';
      $comuna->save();
      $quillota->comunas()->save($comuna);

      $valparaiso = Provincia::where('name', 'valparaiso')->first();

      $comuna = new Comuna();
      $comuna->name = 'valparaiso';
      $comuna->save();
      $valparaiso->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'viña del mar';
      $comuna->save();
      $valparaiso->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'concón';
      $comuna->save();
      $valparaiso->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quintero';
      $comuna->save();
      $valparaiso->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'puchuncaví';
      $comuna->save();
      $valparaiso->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'casablanca';
      $comuna->save();
      $valparaiso->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'juan fernández';
      $comuna->save();
      $valparaiso->comunas()->save($comuna);

      $antonio = Provincia::where('name', 'san antonio')->first();

      $comuna = new Comuna();
      $comuna->name = 'san antonio';
      $comuna->save();
      $antonio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cartagena';
      $comuna->save();
      $antonio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'el tabo';
      $comuna->save();
      $antonio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'el quisco';
      $comuna->save();
      $antonio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'algarrobo';
      $comuna->save();
      $antonio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'santo domingo';
      $comuna->save();
      $antonio->comunas()->save($comuna);

      $pascua = Provincia::where('name', 'isla de pascua')->first();

      $comuna = new Comuna();
      $comuna->name = 'isla de pascua';
      $comuna->save();
      $pascua->comunas()->save($comuna);

      $marga = Provincia::where('name', 'marga marga')->first();

      $comuna = new Comuna();
      $comuna->name = 'quilpué';
      $comuna->save();
      $marga->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'limache';
      $comuna->save();
      $marga->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'olmué';
      $comuna->save();
      $marga->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'villa alemana';
      $comuna->save();
      $marga->comunas()->save($comuna);

      $chacabuco = Provincia::where('name', 'chacabuco')->first();

      $comuna = new Comuna();
      $comuna->name = 'colina';
      $comuna->save();
      $chacabuco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lampa';
      $comuna->save();
      $chacabuco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'tiltil';
      $comuna->save();
      $chacabuco->comunas()->save($comuna);

      $santiago = Provincia::where('name', 'santiago')->first();

      $comuna = new Comuna();
      $comuna->name = 'santiago';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'vitacura';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san ramón';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san miguel';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san joaquín';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'renca';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'recoleta';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quinta normal';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quilicura';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pudahuel';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'providencia';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'peñalolén';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pedro aguirre cerda';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'ñuñoa';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'maipú';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'macul';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lo prado';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lo espejo';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lo barnechea';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'las condes';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'la reina';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'la pintana';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'la granja';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'la florida';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'la cisterna';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'independencia';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'huechuraba';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'estación central';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'el Bosque';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'conchalí';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cerro navia';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cerrillos';
      $comuna->save();
      $santiago->comunas()->save($comuna);

      $cordillera = Provincia::where('name', 'cordillera')->first();

      $comuna = new Comuna();
      $comuna->name = 'puente alto';
      $comuna->save();
      $cordillera->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san josé de maipo';
      $comuna->save();
      $cordillera->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pirque';
      $comuna->save();
      $cordillera->comunas()->save($comuna);

      $maipo = Provincia::where('name', 'maipo')->first();

      $comuna = new Comuna();
      $comuna->name = 'san bernardo';
      $comuna->save();
      $maipo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'buin';
      $comuna->save();
      $maipo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'paine';
      $comuna->save();
      $maipo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'calera de tango';
      $comuna->save();
      $maipo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'calera de tango';
      $comuna->save();
      $maipo->comunas()->save($comuna);

      $melipilla = Provincia::where('name', 'melipilla')->first();

      $comuna = new Comuna();
      $comuna->name = 'melipilla';
      $comuna->save();
      $melipilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'alhué';
      $comuna->save();
      $melipilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'curacaví';
      $comuna->save();
      $melipilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'maría pinto';
      $comuna->save();
      $melipilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san pedro';
      $comuna->save();
      $melipilla->comunas()->save($comuna);

      $talagante = Provincia::where('name', 'talagante')->first();

      $comuna = new Comuna();
      $comuna->name = 'isla de maipo';
      $comuna->save();
      $talagante->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'el monte';
      $comuna->save();
      $talagante->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'padre hurtado';
      $comuna->save();
      $talagante->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'peñaflor';
      $comuna->save();
      $talagante->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'talagante';
      $comuna->save();
      $talagante->comunas()->save($comuna);

      $cachapoal = Provincia::where('name', 'cachapoal')->first();

      $comuna = new Comuna();
      $comuna->name = 'codegua';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'coínco';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'coltauco';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'doñihue';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'graneros';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'las cabras';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'machalí';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'malloa';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'mostazal';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'olivar';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'peumo';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pichidegua';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quinta de tilcoco';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'rancagua';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'rengo';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'requínoa';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san vicente de tagua tagua';
      $comuna->save();
      $cachapoal->comunas()->save($comuna);

      $colchagua = Provincia::where('name', 'colchagua')->first();

      $comuna = new Comuna();
      $comuna->name = 'chépica';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'chimbarongo';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lolol';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'nancagua';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'palmilla';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'peralillo';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'placilla';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pumanque';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san fernando';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'santa cruz';
      $comuna->save();
      $colchagua->comunas()->save($comuna);

      $cardenal = Provincia::where('name', 'cardenal caro')->first();

      $comuna = new Comuna();
      $comuna->name = 'la estrella';
      $comuna->save();
      $cardenal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'litueche';
      $comuna->save();
      $cardenal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'marchigüe';
      $comuna->save();
      $cardenal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'navidad';
      $comuna->save();
      $cardenal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'paredones';
      $comuna->save();
      $cardenal->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pichilemu';
      $comuna->save();
      $cardenal->comunas()->save($comuna);

      $curico = Provincia::where('name', 'curicó')->first();

      $comuna = new Comuna();
      $comuna->name = 'curicó';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'hualañé';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'licantén';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'molina';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'rauco';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'romeral';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'sagrada familia';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'teno';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'vichuquén';
      $comuna->save();
      $curico->comunas()->save($comuna);

      $talca = Provincia::where('name', 'talca')->first();

      $comuna = new Comuna();
      $comuna->name = 'talca';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san clemente';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pelarco';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pencahue';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'maule';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san rafael';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'constitución';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'empedrado';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'río claro';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'curepto';
      $comuna->save();
      $talca->comunas()->save($comuna);

      $linares = Provincia::where('name', 'linares')->first();

      $comuna = new Comuna();
      $comuna->name = 'linares';
      $comuna->save();
      $linares->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san javier';
      $comuna->save();
      $linares->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'parral';
      $comuna->save();
      $linares->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'villa alegre';
      $comuna->save();
      $linares->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'longaví';
      $comuna->save();
      $linares->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'colbún';
      $comuna->save();
      $linares->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'retiro';
      $comuna->save();
      $linares->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'yerbas buenas';
      $comuna->save();
      $linares->comunas()->save($comuna);

      $cauquenes = Provincia::where('name', 'cauquenes')->first();

      $comuna = new Comuna();
      $comuna->name = 'cauquenes';
      $comuna->save();
      $cauquenes->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'chanco';
      $comuna->save();
      $cauquenes->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pelluhue';
      $comuna->save();
      $cauquenes->comunas()->save($comuna);

      $dig = Provincia::where('name', 'diguillín')->first();

      $comuna = new Comuna();
      $comuna->name = 'bulnes';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'chillán';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'chillán viejo';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'el carmen';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pemuco';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pinto';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quillón';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san ignacio';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'yungay';
      $comuna->save();
      $dig->comunas()->save($comuna);

      $itata = Provincia::where('name', 'itata')->first();

      $comuna = new Comuna();
      $comuna->name = 'cobquecura';
      $comuna->save();
      $itata->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'coelemu';
      $comuna->save();
      $itata->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'ninhue';
      $comuna->save();
      $itata->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'portezuelo';
      $comuna->save();
      $itata->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quirihue';
      $comuna->save();
      $itata->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'ránquil';
      $comuna->save();
      $itata->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'treguaco';
      $comuna->save();
      $itata->comunas()->save($comuna);

      $punilla = Provincia::where('name', 'punilla')->first();

      $comuna = new Comuna();
      $comuna->name = 'san carlos';
      $comuna->save();
      $punilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'coihueco';
      $comuna->save();
      $punilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san nicolás';
      $comuna->save();
      $punilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'ñiquén';
      $comuna->save();
      $punilla->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san fabián';
      $comuna->save();
      $punilla->comunas()->save($comuna);

      $bio = Provincia::where('name', 'bio bío')->first();

      $comuna = new Comuna();
      $comuna->name = 'alto biobío';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'antuco';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cabrero';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'laja';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'los angeles';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'mulchén';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'nacimiento';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'negrete';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quilaco';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quilleco';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san rosendo';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'santa bárbara';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'tucapel';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'yumbel';
      $comuna->save();
      $bio->comunas()->save($comuna);

      $concep = Provincia::where('name', 'concepción')->first();

      $comuna = new Comuna();
      $comuna->name = 'concepción';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'coronel';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'chiguayante';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'florida';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'hualpén';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'hualqui';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lota';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'penco';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san pedro de la paz';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'santa juana';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'talcahuano';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'tomé';
      $comuna->save();
      $concep->comunas()->save($comuna);

      $arauco = Provincia::where('name', 'arauco')->first();

      $comuna = new Comuna();
      $comuna->name = 'arauco';
      $comuna->save();
      $arauco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cañete';
      $comuna->save();
      $arauco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'contulmo';
      $comuna->save();
      $arauco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'curanilahue';
      $comuna->save();
      $arauco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lebu';
      $comuna->save();
      $arauco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'los alamos';
      $comuna->save();
      $arauco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'tirúa';
      $comuna->save();
      $arauco->comunas()->save($comuna);

      $malleco = Provincia::where('name', 'malleco')->first();

      $comuna = new Comuna();
      $comuna->name = 'angol';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'collipulli';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'curacautín';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'ercilla';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lonquimay';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'los sauces';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lumaco';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'purén';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'renaico';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'traiguén';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'victoria';
      $comuna->save();
      $malleco->comunas()->save($comuna);

      $caut = Provincia::where('name', 'cautín')->first();

      $comuna = new Comuna();
      $comuna->name = 'temuco';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'carahue';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cholchol';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cunco';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'curarrehue';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'freire';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'galvarino';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'gorbea';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lautaro';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'loncoche';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'melipeuco';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'nueva imperial';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'padre las casas';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'perquenco';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pitrufquén';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'pucón';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'saavedra';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'teodoro schmidt';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'toltén';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'vilcún';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'villarrica';
      $comuna->save();
      $caut->comunas()->save($comuna);

      $valdivia = Provincia::where('name', 'valdivia')->first();

      $comuna = new Comuna();
      $comuna->name = 'valdivia';
      $comuna->save();
      $valdivia->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'corral';
      $comuna->save();
      $valdivia->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lanco';
      $comuna->save();
      $valdivia->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'los lagos';
      $comuna->save();
      $valdivia->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'máfil';
      $comuna->save();
      $valdivia->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'mariquina';
      $comuna->save();
      $valdivia->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'paillaco';
      $comuna->save();
      $valdivia->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'panguipulli';
      $comuna->save();
      $valdivia->comunas()->save($comuna);

      $ranco = Provincia::where('name', 'ranco')->first();

      $comuna = new Comuna();
      $comuna->name = 'la unión';
      $comuna->save();
      $ranco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'futrono';
      $comuna->save();
      $ranco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'lago ranco';
      $comuna->save();
      $ranco->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'río bueno';
      $comuna->save();
      $ranco->comunas()->save($comuna);

      $osorno = Provincia::where('name', 'osorno')->first();

      $comuna = new Comuna();
      $comuna->name = 'osorno';
      $comuna->save();
      $osorno->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'puerto octay';
      $comuna->save();
      $osorno->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'purranque';
      $comuna->save();
      $osorno->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'puyehue';
      $comuna->save();
      $osorno->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'río negro';
      $comuna->save();
      $osorno->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san juan de la costa';
      $comuna->save();
      $osorno->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san pablo';
      $comuna->save();
      $osorno->comunas()->save($comuna);

      $llanquihue = Provincia::where('name', 'llanquihue')->first();

      $comuna = new Comuna();
      $comuna->name = 'calbuco';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cochamó';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'fresia';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'frutillar';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'llanquihue';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'los muermos';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'maullín';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'puerto montt';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'puerto varas';
      $comuna->save();
      $llanquihue->comunas()->save($comuna);

      $chilo = Provincia::where('name', 'chiloé')->first();

      $comuna = new Comuna();
      $comuna->name = 'ancud';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'castro';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'chonchi';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'curaco de vélez';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'dalcahue';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'puqueldón';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'queilén';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quellón';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quemchi';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'quinchao';
      $comuna->save();
      $chilo->comunas()->save($comuna);

      $palena = Provincia::where('name', 'palena')->first();

      $comuna = new Comuna();
      $comuna->name = 'chaitén';
      $comuna->save();
      $palena->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'futaleufú';
      $comuna->save();
      $palena->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'hualaihué';
      $comuna->save();
      $palena->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'palena';
      $comuna->save();
      $palena->comunas()->save($comuna);

      $coyhaique = Provincia::where('name', 'coyhaique')->first();

      $comuna = new Comuna();
      $comuna->name = 'lago verde';
      $comuna->save();
      $coyhaique->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'coihaique';
      $comuna->save();
      $coyhaique->comunas()->save($comuna);

      $ays = Provincia::where('name', 'aysén')->first();

      $comuna = new Comuna();
      $comuna->name = 'aysén';
      $comuna->save();
      $ays->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'cisnes';
      $comuna->save();
      $ays->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'guaitecas';
      $comuna->save();
      $ays->comunas()->save($comuna);

      $general = Provincia::where('name', 'general carrera')->first();

      $comuna = new Comuna();
      $comuna->name = 'río ibáñez';
      $comuna->save();
      $general->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'chile chico';
      $comuna->save();
      $general->comunas()->save($comuna);

      $cap = Provincia::where('name', 'capitán prat')->first();

      $comuna = new Comuna();
      $comuna->name = 'cochrane';
      $comuna->save();
      $cap->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'o\'higgins';
      $comuna->save();
      $cap->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'tortel';
      $comuna->save();
      $cap->comunas()->save($comuna);

      $ultima = Provincia::where('name', 'ultima esperanza')->first();

      $comuna = new Comuna();
      $comuna->name = 'torres del paine';
      $comuna->save();
      $ultima->comunas()->save($comuna);

      $magallanes = Provincia::where('name', 'magallanes')->first();

      $comuna = new Comuna();
      $comuna->name = 'laguna blanca';
      $comuna->save();
      $magallanes->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'punta arenas';
      $comuna->save();
      $magallanes->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'río verde';
      $comuna->save();
      $magallanes->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'san gregorio';
      $comuna->save();
      $magallanes->comunas()->save($comuna);

      $tierra = Provincia::where('name', 'tierra del fuego')->first();

      $comuna = new Comuna();
      $comuna->name = 'porvenir';
      $comuna->save();
      $tierra->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'primavera';
      $comuna->save();
      $tierra->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'timaukel';
      $comuna->save();
      $tierra->comunas()->save($comuna);

      $ant = Provincia::where('name', 'antártica chilena')->first();

      $comuna = new Comuna();
      $comuna->name = 'cabo de hornos';
      $comuna->save();
      $ant->comunas()->save($comuna);

      $comuna = new Comuna();
      $comuna->name = 'antártica';
      $comuna->save();
      $ant->comunas()->save($comuna);

    }
}
