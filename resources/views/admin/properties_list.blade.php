@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Popiedades</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Listado de propiedades</li>
         </ol>
      </div>
   </div>
</div>
<div class="row" ng-app="myApp" ng-controller="paginado">
   <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
   <div class="col-md-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <a class="btn btn-pill btn-success" href="{{url('properties/create')}}"> <i class="fa fa-plus-square-o" aria-hidden="true"></i> Nueva Propiedad</a>
            <form class="search-admin">
               <label><i class="fa fa-search"></i></label>
               <input type="text" ng-model="search" ng-change="filter()" placeholder="Buscar...." class="form-control" >
            </form>
         </div>
         <div class="table-responsive">
            <table width="100%" class="table">
               <thead>
                  <tr>
                     <th style="width: 1%">
                        <div >ID</div>
                     </th>
                     <th style="width: 22%">
                        <div >Título</div>
                     </th>
                     <th style="width: 10%">
                        <div class="text-center">Tipo</div>
                     </th>
                     <th style="width: 15%">
                        <div class="text-center">Registro</div>
                     </th>
                     <th style="width: 20%"></th>
                  </tr>
               </thead>
               <tbody id="navsm">
                  <tr id="loader">
                     <td colspan="6" style="text-align: center;">
                        <div class="spinner-border" role="status">
                           <span class="sr-only">Loading...</span>
                        </div>
                     </td>
                  </tr>
                  <tr ng-repeat="row in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" id="item_@{{row.id}}">
                     <td style="vertical-align: middle;"> @{{$index+1}}</td>
                     <td style="vertical-align: middle;"> @{{row.title}} </td>
                     <td style="vertical-align: middle; text-align: center;"> @{{row.type}} </td>
                     <td style="vertical-align: middle; text-align: center;">  @{{row.created_at | date : MM/dd/yyyy }} </td>
                     <td style="vertical-align: middle; text-align: right;">
                        <a href="{{url('/')}}/properties/@{{row.id}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Editar</a>
                        <a  ng-click="borrar(row.id);" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Eliminar</a>
                     </td>
                  </tr>
                  <tr ng-show="filteredItems == 0" >
                     <td colspan="5">
                        <p class="text-italic"><i data-feather="alert-circle"></i> No hay resultados para mostrar</p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="card-body">
            <ul class="pagination" ng-show="filteredItems > 0">
               <li  pagination="" page="currentPage" on-select-page="setPage(page)" total-items="filteredItems" items-per-page="entryLimit" class="page-item" previous-text="&laquo;" next-text="&raquo;"></li>
            </ul>
            <p ng-show="filteredItems != 0" ><br>@{{totalItems}} Registro(s) encontrado(s)</p>



                
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
  
   var app = angular.module('myApp', ['ui.bootstrap']);
   app.filter('startFrom', function() {
   return function(input, start) {
   if (input) {
       start = +start;
       return input.slice(start);
   }
   return [];
   }
   });
   app.controller('paginado', function($scope, $http, $window) {
   //Listar Paginas 
   $scope.rows = function() {
   $http.get("{{url('properties_lists')}}").then(function successCallback(response)  {
       $scope.list = response.data;
       $scope.currentPage = 1;
       $scope.entryLimit = 100;
       $scope.filteredItems = $scope.list.length;
       $scope.totalItems = $scope.list.length;
             $("#mask").hide();
             $("#loader").hide();
   });
   }
   $scope.rows();
   //cambiar numero de pagina
   $scope.setPage = function(pageNo) {
   $scope.currentPage = pageNo;
   };
   // filtrar paginas
   $scope.filter = function() {
   $scope.filteredItems = $scope.filtered.length;
   $scope.totalItems = $scope.filtered.length
   };
   $scope.sort_by = function(predicate) {
   $scope.predicate = predicate;
   $scope.reverse = !$scope.reverse;
   };
   //borrar página
   $scope.borrar = function(id) {
   swal({
  title: "¿Deseas eliminar este registro?",
       text: "",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: '#fd2923',
       confirmButtonText: 'Si eliminar',
           cancelButtonText: 'Cancelar',
           closeOnConfirm: true
       },
       function() {
           // Url 
           var route = "{{url('/')}}/properties/" + id + "";
           var token = $("#token").val();
           //Enviar Datos
           $.ajax({
               url: route,
               headers: {
                   'X-CSRF-TOKEN': token
               },
               type: 'DELETE',
               dataType: 'json',
               success: function() {
                   $.growl.error({
                       title: "<i class='fa fa-exclamation-circle'></i> Atención",
                       message: "Registro eliminado"
                   });
                   $scope.rows();
               },
               error: function(msj) {
                   $.growl.error({
                       title: "<i class='fa fa-exclamation-circle'></i> Error",
                       message: 'Ha ocurrido un error por favor intente más tarde'
                   });
               }
           });
       });
   }
   });
</script>
@stop