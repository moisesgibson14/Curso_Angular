<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>inicio</title>
    <script src="js/angular.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <style media="screen">
    .container{
        width: 350px;
        height: 400px;
        margin: 10px;
        padding: 20px;
        border: 1px solid;
        border-radius: 10px;
        background-color: #E6E6FA;
        float: left;
     }
    </style>
    <!-- Mostrar temas-->
  </head>
  
  <body ng-app="fetch">   
    <div ng-controller="dbCtrl">
      <div class="jumbotron text-center">
          <section id="temaActivo">
              <fieldset align="center">
                  <div>
                      <div id="content" >
                          <div align="center">
                                <h3>Title:{{temaActual.titulo}}</h3>
                                <div>
                                    <p class="post-contenido text-justify">{{temaActual.introduccion}}</p>
                                </div>
                                <br/>
                                <h3>Publicado el:</h3><span>{{temaActual.fechareg}}</span>
                          </div>                            	  
                        	<h3>Desarrollo</h3>
                        	<p class="post-contenido text-justify">
                            {{temaActual.tematext}}
                           </p>
                        	<form class="" action="php/descarga.php" method="post">
                            <a href="#pdfmiTemaActual"  data-toggle="modal" x`><img src="img/pdf.png" height="80" left="80" placeholder="Ver" /></a>                                                                                        
                          </form>
                      </div>
                  </div>
              </fieldset>
          </section>
      </div>
      <section id="cerrar">
          <fieldset >
              <div ng-repeat="tema in data" class="container" id="tema.id" >
                  <div >
                      <div align="center">
                          <h2>{{tema.titulo}}</h2>
                          <br/>
                          <div>
                          <p class="post-contenido text-justify">{{tema.introduccion}}</p>
                          </div>
                          <span>Publicado el:{{tema.fechareg}}</span><br />
                          <a ng-click="mostrarTema(tema)" href="#temaActivo" class="btn btn-primary">Leer Mas</a>
                      </div>
                  </div>
              </div>
          </fieldset>
      </section>
      <div id="pdfmiTemaActual" class="modal fade" role="dialog" >
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<button type="button" class="close" data-dismiss="modal">&times;</button>
      				<h6 class="modal-title">Titulo</h6>            				
      			</div>
    				<div class="row">
    					<div class="col-lg-12">
    						<center><h3 id="nombre_pdf" class="text-primary">{{temaActual.titulo}}</h3></center>            				
    						<center><iframe frameborder="0" allowtransparency="true" scrolling="auto" style="overflow: hidden; " id="pdf" src="{{temaActual.pdf}}"  width="65%" height="500px" ></iframe></center>
    					</div>
    				</div>
      		</div>            		
      	</div>
      </div>
    </div>
    <script>
      var fetch = angular.module('fetch', []);
      fetch.controller('dbCtrl', function ($scope, $http) {
          getItem();
          function getItem(){
            $http.post("php/obtener.php").success(function(data){
                $scope.data = data;
                console.log($scope.data);

            })
          .error(function() {
            $scope.data = "error in fetching dat";
            });
          };

          $scope.mostrarTema = function(tema){
              $scope.temaActual=tema;              
            //alert($scope.temaActual.pdf);              
          }          
      });
    </script>
  </body>
</html>
