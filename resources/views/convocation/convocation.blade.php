@php

$path = base_path('public/image/fpsLogo.png');
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$photoURL = Auth::user()->etudiant->photo ;
$pathEtudiant = base_path('public/image/' . $photoURL);
$typePhoto = pathinfo($pathEtudiant, PATHINFO_EXTENSION);
$dataPhoto = file_get_contents($pathEtudiant);
$photoEtudiant = 'data:image/' . $typePhoto . ';base64,' . base64_encode($dataPhoto);

$matriculeEtudiant = Auth::user()->etudiant->Student_Matricule ;

$qrCode = QrCode::size(512)->generate($matriculeEtudiant);

//$png = base64_encode($png);
$qrCode = 'data:image/s' . $typePhoto . ';base64,' . base64_encode($qrCode);
$etudiantPhoto = Auth::user()->etudiant->photo;
//dd($QrCodeEtudiant) ;
//dd($qrCodeEtudiant) ;

use App\Models\Filiere ;
    use App\Models\Etudiant ;
    use App\Models\Module ;
    use App\Models\Examen ;
    use App\Models\etudiant_module;
    use App\Models\Semestre ;
    $anneeExamen = Examen::where('examen.id_examen', Auth::user()->etudiant->id_exame)->first() ;
    $filierEtudiant = Filiere::select('filiere.Nom_Filiere')->where('filiere.id_filiere', Auth::user()->etudiant->id_filiere)->first()->Nom_Filiere ;
    $etudiantPhoto = Auth::user()->etudiant->photo;
    $etudiant = new Etudiant() ;
    $etudiant = Auth::user()->etudiant ;
    $listModule = etudiant_module::select('etudiant_module.id_module')->where('etudiant_module.id_etudiant' ,$etudiant->id_etudiant)->get() ;
@endphp

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Convocation au examen</title>

		<style>
        html {
          font-family: "rubik";
          line-height: 1.15;
          -webkit-text-size-adjust: 100%;
          -ms-text-size-adjust: 100%;
          -ms-overflow-style: scrollbar;
          -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        body {
          margin: 0;
          font-family: "rubik", "Helvetica", "Arial", sans-serif;
          font-size: 1rem;
          font-weight: 400;
          line-height: 1.5;
          color: #212529;
          text-align: left;
          background-color: #ffffff;
        }

        .circle {
      border-color: #666 #1c87c9;
      border-image: none;
      border-radius: 50% 50% 50% 50%;
      border-style: solid;
      border-width: 25px;
      height: 200px;
      width: 200px;
      overflow: hidden;
      }

        p {
          font-size: 25px;
          font-weight: 400;
          line-height: 1;
          position: relative;
          left: 140px;
        }
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 40px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'rubik', 'Helvetica', Helvetica, Arial, sans-serif;
				color: rgb(0, 0, 0);
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: rgb(0, 0, 0);
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #5db5f5;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 5px;
			}

			.invoice-box table tr.item td {
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="{{$base64}}" style="width: 100%; max-width: 130px" />
                  <p style="text-align: center">Convocation au Examen</p>
								</td>

								<td>
                  Faculté polydisciplinaire SAFI<br/>
				  Service FPS <br>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Etudiant : {{Auth::user()->etudiant->Nom}} {{Auth::user()->etudiant->Prenom}}<br />
									Filiere : {{$filierEtudiant}}<br />
									Année universitaire :{{$anneeExamen->Année_universitaire}}<br>
                  					Session : {{$anneeExamen->session}} <br>
									saison : {{$anneeExamen->saison}}
								</td>

								<td>
									<img src="{{$photoEtudiant}}" width="100px">
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Liste des modules inscrie</td>

					<td></td>
				</tr>
        @foreach ($listModule as $listModule)
				<tr class="item">
					<td style="font-size: 12px">{{Module::select('module.nom_module')->where('module.id_module' ,$listModule->id_module)->first()->nom_module}}</td>
					<td style="font-size: 12px">{{Semestre::select('semestre.nom_semestre')->join('module' ,'module.id_semestre' ,'=' ,'semestre.id_semestre')->where('module.id_module',$listModule->id_module)->first()->nom_semestre}}</td>
				</tr>
        @endforeach

        <img src="{{$qrCode}}" width="150px">
			</table>
		</div>
	</body>
</html>