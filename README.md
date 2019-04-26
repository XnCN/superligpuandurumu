## SüperLig Puan Durumu

Türkiye Süper Ligi Puan Durumu ve takımların genel istatisliklerini görebileceğimiz basit kullanımlı ve özelleştirilebilir php kütüphanesidir.Veriler ntvspor aracılığı ile broadage üzerinden alınmaktadır.

## Özellikleri
 - Süper Lig takımlarının listesi
 - Basit Süper Lig puan durumu verileri
 - Ayrıntılı Süper Lig puan durumu verileri
 - Takımların Logoları

## Kullanımı
Kütüphanenin dahil edilmesi ve kullanıma hazırlanması

    include  "SuperLigStandings.php";
    use XnCN\Standings\SuperLigStandings;
    $api  =  new SuperLigStandings();

**Takım İsim Listesinin Alınması**
Bu alanda 3 adet veri dönmektedir , bunlar;
 - name : Takımın tam adı
 - middleName : Takımın kısaltmalı adı
 - shortName : Takımın kısa adı

    $teamNames  =  $api->getTeamNames();
    foreach ($teamNames  as  $team) {
    	print  $team->name;
    	print  $team->middleName;
    	print  $team->shortName;
    }

**Basit Puan Durumunun Alınması**
Bu alanda 4 veri dönmektedir bunlar;
 - name : Takımın adı
 - shortName : Takımın kısa adı
 - position  : Takımın ligde bulunduğu sıralama
 - points : Takımın topladığı puan

    $simpleStandings  =  $api->getSimpleStandings();
    foreach ($simpleStandings  as  $team) {
	    print  $team->name;
	    print  $team->shortName;
	    print  $team->position;
	    print  $team->points;
    }

**Detaylı Puan Durumunun Alınması**
Bu alanda 11 veri dönmektedir bunlar;
 - name : Takımın adı
 - middleName : Takımın kısaltmalı adı
 - shortName : Takımın kısa adı
 - position  : Takımın ligde bulunduğu sıralama
 - points : Takımın topladığı puan
 - against : Takımın yediği gol sayısı
 - average : Takımın attığı ve yediği goller arasındaki fark
 - lost : Kaybedilen maç sayısı
 - played :Oynanılan maç sayısı
 - won : Kazanılan maç sayısı
 - logo: Takımın logosunun web adresi

    $standings  =  $api->getStandings();
    foreach ($standings  as  $team) {
	    print  $team->name;
	    print  $team->middleName;
	    print  $team->shortName;
	    print  $team->position;
	    print  $team->points;
	    print  $team->against;
	    print  $team->average;
	    print  $team->lost;
	    print  $team->played;
	    print  $team->won;
	    print  $team->logo;
    }
