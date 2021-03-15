<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provincia;
use App\Models\Region;

class Provincias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $aryp = Region::where('name', 'arica y parinacota')->first();

      $provincia1 = new Provincia();
      $provincia1->name = 'arica';
      $provincia1->save();
      $aryp->provincias()->save($provincia1);

      $provincia2 = new Provincia();
      $provincia2->name = 'parinacota';
      $provincia2->save();
      $aryp->provincias()->save($provincia2);

      $tar = Region::where('name', 'tarapacá')->first();

      $provincia3 = new Provincia();
      $provincia3->name = 'iquique';
      $provincia3->save();
      $tar->provincias()->save($provincia3);

      $provincia4 = new Provincia();
      $provincia4->name = 'el tamarugal';
      $provincia4->save();
      $tar->provincias()->save($provincia4);

      $anto = Region::where('name', 'antofagasta')->first();

      $provincia5 = new Provincia();
      $provincia5->name = 'tocopilla';
      $provincia5->save();
      $anto->provincias()->save($provincia5);

      $provincia6 = new Provincia();
      $provincia6->name = 'el loa';
      $provincia6->save();
      $anto->provincias()->save($provincia6);

      $provincia7 = new Provincia();
      $provincia7->name = 'antofagasta';
      $provincia7->save();
      $anto->provincias()->save($provincia7);

      $ata = Region::where('name', 'atacama')->first();

      $provincia8 = new Provincia();
      $provincia8->name = 'chañaral';
      $provincia8->save();
      $ata->provincias()->save($provincia8);

      $provincia9 = new Provincia();
      $provincia9->name = 'copiapó';
      $provincia9->save();
      $ata->provincias()->save($provincia9);

      $provincia10 = new Provincia();
      $provincia10->name = 'huasco';
      $provincia10->save();
      $ata->provincias()->save($provincia10);

      $coq = Region::where('name', 'coquimbo')->first();

      $provincia11 = new Provincia();
      $provincia11->name = 'elqui';
      $provincia11->save();
      $coq->provincias()->save($provincia11);

      $provincia12 = new Provincia();
      $provincia12->name = 'limarí';
      $provincia12->save();
      $coq->provincias()->save($provincia12);

      $provincia13 = new Provincia();
      $provincia13->name = 'choapa';
      $provincia13->save();
      $coq->provincias()->save($provincia13);

      $val = Region::where('name', 'valparaíso')->first();

      $provincia14 = new Provincia();
      $provincia14->name = 'petorca';
      $provincia14->save();
      $val->provincias()->save($provincia14);

      $provincia15 = new Provincia();
      $provincia15->name = 'los andes';
      $provincia15->save();
      $val->provincias()->save($provincia15);

      $provincia16 = new Provincia();
      $provincia16->name = 'san felipe de aconcagua';
      $provincia16->save();
      $val->provincias()->save($provincia16);

      $provincia17 = new Provincia();
      $provincia17->name = 'quillota';
      $provincia17->save();
      $val->provincias()->save($provincia17);

      $provincia18 = new Provincia();
      $provincia18->name = 'valparaiso';
      $provincia18->save();
      $val->provincias()->save($provincia18);

      $provincia19 = new Provincia();
      $provincia19->name = 'san antonio';
      $provincia19->save();
      $val->provincias()->save($provincia19);

      $provincia20 = new Provincia();
      $provincia20->name = 'isla de pascua';
      $provincia20->save();
      $val->provincias()->save($provincia20);

      $provincia21 = new Provincia();
      $provincia21->name = 'marga marga';
      $provincia21->save();
      $val->provincias()->save($provincia21);

      $san = Region::where('name', 'santiago')->first();

      $provincia22 = new Provincia();
      $provincia22->name = 'chacabuco';
      $provincia22->save();
      $san->provincias()->save($provincia22);

      $provincia23 = new Provincia();
      $provincia23->name = 'santiago';
      $provincia23->save();
      $san->provincias()->save($provincia23);

      $provincia24 = new Provincia();
      $provincia24->name = 'cordillera';
      $provincia24->save();
      $san->provincias()->save($provincia24);

      $provincia25 = new Provincia();
      $provincia25->name = 'maipo';
      $provincia25->save();
      $san->provincias()->save($provincia25);

      $provincia26 = new Provincia();
      $provincia26->name = 'melipilla';
      $provincia26->save();
      $san->provincias()->save($provincia26);

      $provincia27 = new Provincia();
      $provincia27->name = 'talagante';
      $provincia27->save();
      $san->provincias()->save($provincia27);

      $ohi = Region::where('name', 'ohiggins')->first();

      $provincia28 = new Provincia();
      $provincia28->name = 'cachapoal';
      $provincia28->save();
      $ohi->provincias()->save($provincia28);

      $provincia29 = new Provincia();
      $provincia29->name = 'colchagua';
      $provincia29->save();
      $ohi->provincias()->save($provincia29);

      $provincia30 = new Provincia();
      $provincia30->name = 'cardenal caro';
      $provincia30->save();
      $ohi->provincias()->save($provincia30);

      $mau = Region::where('name', 'maule')->first();

      $provincia31 = new Provincia();
      $provincia31->name = 'curicó';
      $provincia31->save();
      $mau->provincias()->save($provincia31);

      $provincia32 = new Provincia();
      $provincia32->name = 'talca';
      $provincia32->save();
      $mau->provincias()->save($provincia32);

      $provincia33 = new Provincia();
      $provincia33->name = 'linares';
      $provincia33->save();
      $mau->provincias()->save($provincia33);

      $provincia34 = new Provincia();
      $provincia34->name = 'cauquenes';
      $provincia34->save();
      $mau->provincias()->save($provincia34);

      $nub = Region::where('name', 'ñuble')->first();

      $provincia35 = new Provincia();
      $provincia35->name = 'diguillín';
      $provincia35->save();
      $nub->provincias()->save($provincia35);

      $provincia36 = new Provincia();
      $provincia36->name = 'itata';
      $provincia36->save();
      $nub->provincias()->save($provincia36);


      $provincia37 = new Provincia();
      $provincia37->name = 'punilla';
      $provincia37->save();
      $nub->provincias()->save($provincia37);


      $bio = Region::where('name', 'biobío')->first();

      $provincia38 = new Provincia();
      $provincia38->name = 'bio bío';
      $provincia38->save();
      $bio->provincias()->save($provincia38);


      $provincia39 = new Provincia();
      $provincia39->name = 'concepción';
      $provincia39->save();
      $bio->provincias()->save($provincia39);


      $provincia40 = new Provincia();
      $provincia40->name = 'arauco';
      $provincia40->save();
      $bio->provincias()->save($provincia40);

      $ara = Region::where('name', 'la araucanía')->first();

      $provincia41 = new Provincia();
      $provincia41->name = 'malleco';
      $provincia41->save();
      $ara->provincias()->save($provincia41);

      $provincia42 = new Provincia();
      $provincia42->name = 'cautín';
      $provincia42->save();
      $ara->provincias()->save($provincia42);

      $rios = Region::where('name', 'los ríos')->first();

      $provincia43 = new Provincia();
      $provincia43->name = 'valdivia';
      $provincia43->save();
      $rios->provincias()->save($provincia43);

      $provincia44 = new Provincia();
      $provincia44->name = 'ranco';
      $provincia44->save();
      $rios->provincias()->save($provincia44);

      $lagos = Region::where('name', 'los lagos')->first();

      $provincia45 = new Provincia();
      $provincia45->name = 'osorno';
      $provincia45->save();
      $lagos->provincias()->save($provincia45);

      $provincia46 = new Provincia();
      $provincia46->name = 'llanquihue';
      $provincia46->save();
      $lagos->provincias()->save($provincia46);

      $provincia47 = new Provincia();
      $provincia47->name = 'chiloé';
      $provincia47->save();
      $lagos->provincias()->save($provincia47);

      $provincia48 = new Provincia();
      $provincia48->name = 'palena';
      $provincia48->save();
      $lagos->provincias()->save($provincia48);

      $ays = Region::where('name', 'aysén')->first();

      $provincia49 = new Provincia();
      $provincia49->name = 'coyhaique';
      $provincia49->save();
      $ays->provincias()->save($provincia49);

      $provincia50 = new Provincia();
      $provincia50->name = 'aysén';
      $provincia50->save();
      $ays->provincias()->save($provincia50);

      $provincia51 = new Provincia();
      $provincia51->name = 'general carrera';
      $provincia51->save();
      $ays->provincias()->save($provincia51);

      $provincia52 = new Provincia();
      $provincia52->name = 'capitán prat';
      $provincia52->save();
      $ays->provincias()->save($provincia52);

      $mag = Region::where('name', 'magallanes')->first();

      $provincia53 = new Provincia();
      $provincia53->name = 'ultima esperanza';
      $provincia53->save();
      $mag->provincias()->save($provincia53);

      $provincia54 = new Provincia();
      $provincia54->name = 'magallanes';
      $provincia54->save();
      $mag->provincias()->save($provincia54);

      $provincia55 = new Provincia();
      $provincia55->name = 'tierra del fuego';
      $provincia55->save();
      $mag->provincias()->save($provincia55);

      $provincia56 = new Provincia();
      $provincia56->name = 'antártica chilena';
      $provincia56->save();
      $mag->provincias()->save($provincia56);
    }
}
