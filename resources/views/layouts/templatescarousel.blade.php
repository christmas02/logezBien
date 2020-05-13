<!DOCTYPE html>
<?php
  setlocale(LC_ALL, 'french');

?>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $title }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets/Admin/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="/assets/Admin/vendors/iconfonts/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href=" {{ asset('assets/Admin/css/et-fonts.css') }} ">
  <link rel="stylesheet" href="/assets/Admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/assets/Admin/vendors/css/vendor.bundle.addons.css">
  

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
  <link rel="stylesheet" href="/assets/Admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/asstes/Admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller" id="app">
      @include('inc/navbar')
      @if (session('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
       @endif
      @yield('content')
      @include('inc/footer')
  </div>
    <!-- container-scroller -->

    {{-- app --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- plugins:js -->
    <script src="/assets/Admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="/assets/Admin/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="/assets/Admin/js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
   
    <script src="/assets/Admin/js/data-table.js"></script>
    <script src="/assets/Admin/js/tooltips.js"></script>
    <script src="/assets/Admin/js/file-upload.js"></script>
    
    <script src="/assets/Admin/js/owl-carousel.js"></script>
  

    <script>
      $(document).on('click', '.delete', function() {
            var id = $(this).data('id');
           
            

            // $('.modal-title').text('Delete');
            $('#delete').val(id);
            $('#deleteModal').modal('show');
            $("#form_delete").attr("action","http://localhost:8000/mediatheques/"+id);
     
            
           
        });
    </script>

    <script>
       $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "language": {
                processing:     "Traitement en cours...",
                search:         "Rechercher&nbsp;:",
                lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first:      "Premier",
                    previous:   "Pr&eacute;c&eacute;dent",
                    next:       "Suivant",
                    last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
      });
    </script>
    <!-- End custom js for this page-->
  </body>
  
  </html>
  
  