<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Portfoli</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('img/icon.ico')}}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset('js/plugin/webfont/webfont.min.js') }}"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">


</head>
<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                
                <a href="index.html" class="logo">
                    <img src="{{ asset('img/logo.svg')}}"  alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">  
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('img/icon.ico')}}" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="u-text">
                                                <h4> Hey {{ Auth::user()->name }}!</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">           
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-primary">
                        <li class="nav-item">
                            <a  href="/">
                                <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        @if(($acesso['projects'] > 0) || ($acesso['indicators'] > 0) || ($acesso['members'] > 0))
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#port">
                                <i class="fas far fa-lightbulb"></i>
                                <p>Portfólio</p>
                                <span class="caret">
                            </a>
                            <div class="collapse" id="port">
                                <ul class="nav nav-collapse">
                                    @if($acesso['projects'] > 0)
                                        <li>
                                        <a href="/project">
                                            <i class="fas fa-layer-group"></i>
                                            <p>Projetos</p>
                                        </a>
                                        </li>
                                    @endif
                                    @if($acesso['indicators'] > 0)
                                        <li>
                                            <a href="/indicator">
                                                <i class="fas fas fa-thermometer-half"></i>
                                                <p>Indicadores</p>
                                            </a>
                                        </li>
                                    @endif
                                    @if($acesso['members'] > 0)
                                        <li>
                                            <a href="/member">
                                               <i class="fas fa-user-friends"></i>
                                                <p>Membros</p>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if($acesso['reports'] > 0)
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#rels">
                                <i class="fas fas fa-file-alt"></i>
                                <p>Relatórios</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="rels">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/report/all">
                                            <i class="fas fa-layer-group"></i>
                                            <p>Geral</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/reports">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                            <p>Projeto</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(($acesso['users'] > 0) || ($acesso['permissions'] > 0))
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#configs">
                                <i class="fas fa-cog"></i>
                                <p>Configurações</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="configs">
                                <ul class="nav nav-collapse">
                                    @if($acesso['users'] > 0)
                                    <li>
                                        <a href="/user">
                                            <i class="fas fa-user-friends"></i>
                                            <p>Usuários</p>
                                        </a>
                                    </li>
                                    @endif
                                    @if($acesso['permissions'] > 0)
                                    <li>
                                        <a href="/permission">
                                            <i class="fas fa-lock"></i>
                                            <p>Permissões</p>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <!-- Main Panel -->
        <div class="main-panel">
            @yield('content')
        </div>
        <!-- End Main Panel -->

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/core/popper.min.js')}}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


    <!-- Chart JS -->
    <script src="{{ asset('js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{ asset('js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Atlantis JS -->
    <script src="{{ asset('js/atlantis.min.js')}}"></script>
    <script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select lass="form-control"><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                                );

                            column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                    ]);
                $('#addRowModal').modal('hide');

            });
        });
        $('#deletemodal').on('show.bs.modal', function (event) {
            var origem = $(event.relatedTarget)
            var del = origem.data('delid')
            var modal = $(this)
            modal.find('#delid').val(del);
        });

        document.getElementById('statusproj').addEventListener('change', function () {

            scope = document.getElementById('scope'); 
            just = document.getElementById('just'); 
            scopeinp = document.getElementById('scopeinp'); 
            justinp = document.getElementById('justinp'); 


                if (this.value == '3') {

                    scope.style.display = '';
                    just.style.display = '';
                    scopeinp.required = true;
                    justinp.required = true;

                }else if(this.value == '8'){


                    scope.style.display = 'none';
                    just.style.display = '';
                    scopeinp.required = false;
                    justinp.required = true;

                }else{

                    scope.style.display = 'none';
                    just.style.display = 'none';
                    scopeinp.required = false;
                    justinp.required = false;
                }
        });
    </script>
</body>
</html>

