<ul class="list-unstyled menu-categories" id="accordionExample">
    <li class="menu active">
        <a href="#dashboard" data-bs-toggle="dropdown" aria-expanded="true" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span>Dashboard</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-right">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
        </a>
        <ul class="dropdown-menu submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">

            @if (\Sentinel::getUser()->inRole('superuser'))
                <li class="">
                    <a href="{{ route('analitica') }}"> Analitica </a>
                </li>
                <li>
                    <a href="{{ route('home') }}"> Dashboard </a>
                </li>
            @endif

        </ul>
    </li>

    <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-minus">
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg><span>APPLICATIONS</span></div>
    </li>

    <li class="menu">
        <a href="#apps" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-cpu">
                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2">
                    </rect>
                    <rect x="9" y="9" width="6" height="6"></rect>
                    <line x1="9" y1="1" x2="9" y2="4"></line>
                    <line x1="15" y1="1" x2="15" y2="4"></line>
                    <line x1="9" y1="20" x2="9" y2="23"></line>
                    <line x1="15" y1="20" x2="15" y2="23"></line>
                    <line x1="20" y1="9" x2="23" y2="9"></line>
                    <line x1="20" y1="14" x2="23" y2="14"></line>
                    <line x1="1" y1="9" x2="4" y2="9"></line>
                    <line x1="1" y1="14" x2="4" y2="14"></line>
                </svg>
                <span>Administración</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-chevron-right">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
        </a>
        <ul class="dropdown-menu submenu list-unstyled" id="apps" data-bs-parent="#accordionExample">
            @if (\Sentinel::getUser()->hasAccess('users'))
                <li @if (Request::is('users*')) class="active" @endif>
                    <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span>Usuarios</span></a>
                </li>
            @endif
            @if (\Sentinel::getUser()->hasAccess('roles'))
                <li @if (Request::is('roles'))  @endif>
                    <a href="{{ route('roles.index') }}"><i class="fa fa-users"></i>Roles</a>
                </li>
            @endif

            @if (\Sentinel::getUser()->hasAccess('roles'))
                <li @if (Request::is('roles_report')) class="active" @endif>
                    <a href="{{ route('roles_report') }}"><i class="fa fa-users"></i><span>Roles - Reporte</span></a>
                </li>
            @endif


            @if (Sentinel::getUser()->hasAccess('permissions'))
                <li @if (Request::is('permissions*')) class="active" @endif>
                    <a href="{{ route('permissions.index') }}"><i class="fa fa-key"></i><span>Permisos</span></a>
                </li>
            @endif
            @if (Sentinel::getUser()->hasAccess('usuarios_bahia'))
                <li @if (Request::is('usuarios_bahia*')) class="active" @endif>
                    <a href="{{ route('usuarios_bahia.index') }}"><i class="fa fa-user"></i><span>Usuarios
                            Bahia</span></a>
                </li>
            @endif
            <li class="sub-submenu dropend">
                <a href="#invoice" data-bs-toggle="dropdown" aria-expanded="false"
                    class="dropdown-toggle collapsed"> Zonas Geográficas <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg> </a>
                <ul class="dropdown-menu list-unstyled sub-submenu" id="invoice">
                    @if (Sentinel::getUser()->hasAccess('departamentos'))
                        <li @if (Request::is('departamentos*')) class="active" @endif>
                            <a href="{{ route('departamentos.index') }}"><i class="fa fa-location-arrow"></i>
                                Departamentos</a>
                        </li>
                    @endif
                    @if (Sentinel::getUser()->hasAccess('ciudades'))
                        <li @if (Request::is('ciudades*')) class="active" @endif>
                            <a href="{{ route('ciudades.index') }}"><i class="fa fa-location-arrow"></i> Ciudades</a>
                        </li>
                    @endif
                    @if (Sentinel::getUser()->hasAccess('barrios'))
                        <li @if (Request::is('barrios*')) class="active" @endif>
                            <a href="{{ route('barrios.index') }}"><i class="fa fa-location-arrow"></i> Barrios</a>
                        </li>
                    @endif
                </ul>
            </li>

            @if (Sentinel::getUser()->hasAccess('notifications_params'))
                <li @if (Request::is('notifications_params*')) class="active" @endif>
                    <a href="{{ route('notifications_params.index') }}"><i class="fa fa-key"></i><span>Configurar
                            Alertas</span></a>
                </li>
            @endif
            @if (\Sentinel::getUser()->hasAccess('parametros_comisiones'))
                <li @if (Request::is('parametros_comisiones*')) class="active" @endif>
                    <a href="{{ route('parametros_comisiones.index') }}">
                        <i class="fa fa-gears"></i><span>Parametros de Comisiones</span>
                    </a>
                </li>
            @endif
            @if (\Sentinel::getUser()->hasAccess('group'))
                <li @if (Request::is('group*')) class="active" @endif>
                    <a href="{{ route('groups.index') }}">
                        <i class="fa fa-object-group"></i></i><span>Grupos</span>
                    </a>
                </li>
            @endif
            <li class="sub-submenu dropend">
                <a href="#ecommerce" data-bs-toggle="dropdown" aria-expanded="false"
                    class="dropdown-toggle collapsed">Gestión de Miniterminal <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg> </a>
                <ul class="dropdown-menu list-unstyled sub-submenu" id="ecommerce" data-bs-parent="#apps">
                    @if (
                        \Sentinel::getUser()->hasAccess('ventas') ||
                            \Sentinel::getUser()->hasAccess('pago_clientes') ||
                            \Sentinel::getUser()->hasAccess('descuento_comision'))
                        <li @if (Request::is('ventas*, pago_clientes*, recibos_comisiones*')) class="active" @endif>
                            @if (\Sentinel::getUser()->hasAccess('ventas'))
                                <a href="{{ route('venta.index') }}">
                                    <i class="fa fa-briefcase"></i><span>Venta Miniterminal</span>
                                </a>
                                <a href="{{ route('alquiler.index') }}">
                                    <i class="fa fa-briefcase"></i><span>Alquiler Miniterminal</span>
                                </a>
                                <a href="{{ route('reporting.cuotas_alquiler') }}">
                                    <i class="fa fa-tags"></i><span>Cuotas de Alquiler</span>
                                </a>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('descuento_comision'))
                                <a href="{{ route('recibos_comisiones.index') }}">
                                    <i class="fa fa-list-alt"></i><span>Descuento por Comision</span>
                                </a>
                            @endif
                        </li>
                    @endif
                </ul>
            </li>

            @if (\Sentinel::getUser()->hasAccess('pago_clientes'))
                <li class="sub-submenu dropend">
                    <a href="#ecommerce" data-bs-toggle="dropdown" aria-expanded="false"
                        class="dropdown-toggle collapsed">Gestión de Miniterminal <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg> </a>
                    <ul class="dropdown-menu list-unstyled sub-submenu" id="blog" data-bs-parent="#apps">
                        @if (\Sentinel::getUser()->hasAccess('pago_clientes'))
                            <li @if (Request::is('pago_clientes')) class="active" @endif>
                                @if (\Sentinel::getUser()->hasAccess('pago_clientes'))
                                    <a href="{{ route('pago_clientes') }}">
                                        <i class="fa fa-money"></i><span>Generar Pago de clientes</span>
                                    </a>
                                @endif
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('pago_clientes.import_pago'))
                            <li @if (Request::is('pago_clientes/register_pago')) class="active" @endif>
                                @if (\Sentinel::getUser()->hasAccess('pago_clientes.import_pago'))
                                    <a href="{{ route('pago_clientes.register_pago') }}">
                                        <i class="fa fa-money"></i><span>Confirmar Pagos</span>
                                    </a>
                                @endif
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('pago_clientes'))
                            <li @if (Request::is('pago_clientes/reporte')) class="active" @endif>
                                <a href="{{ route('reporting.pago_cliente') }}">
                                    <i class="fa fa-money"></i><span>Reporte de Pagos</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            <li class="sub-submenu dropend">
                <a href="#ecommerce" data-bs-toggle="dropdown" aria-expanded="false"
                    class="dropdown-toggle collapsed">Gestión de Dispositivos <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg> </a>
                <ul class="dropdown-menu list-unstyled sub-submenu" id="blog" data-bs-parent="#apps">
                    @if (\Sentinel::getUser()->hasAccess('housing'))
                        <li @if (Request::is('housing*')) class="active" @endif>
                            <a href="{{ route('brands.index') }}">
                                <i class="fa fa-eject" aria-hidden="true"></i><span>Marcas - Modelos</span>
                            </a>
                            <a href="{{ route('miniterminales.index') }}">
                                <i class="fa fa-building"></i><span>Housing</span>
                            </a>
                            <a href="{{ route('devices.showGet') }}">
                                <i class="fa fa-server"></i><span>Listado de dispositivos</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            @if (\Sentinel::getUser()->hasAccess('compra_tarex'))
                <li @if (Request::is('compra_tarex*')) class="active" @endif>
                    <a href="{{ route('compra_tarex.index') }}"><i class="fa fa-credit-card"></i><span>Compra de
                            Saldo</span></a>
                </li>
            @endif

        </ul>
    </li>

    <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-minus">
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg><span>USER INTERFACE</span></div>
    </li>

    @if (\Sentinel::getUser()->hasAccess('reporting'))
        <li class="menu">
            <a href="#components" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-box">
                        <path
                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                        </path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    <span>Reportes</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>

            <ul class="dropdown-menu submenu list-unstyled" id="components" data-bs-parent="#accordionExample">
                <li class="sub-submenu dropend">
                    <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                        class="dropdown-toggle collapsed">Transacciones<svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg> </a>
                    <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                        @if (\Sentinel::getUser()->hasAccess('reporting.transacciones'))
                            <li>
                                <a href="{{ route('reports.transactions') }}">Historico Transacciones</a>
                            </li>
                            <li>
                                <a href="{{ route('reports.one_day_transactions') }}">Transacciones del Día</a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('reporting.transacciones_batch'))
                            <li>
                                <a href="{{ route('reports.batch_transactions') }}">Transacciones Batch</a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('reporting.payments'))
                            <li>
                                <a href="{{ route('reports.payments') }}">Pagos</a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->inRole('superuser'))
                            <li>
                                <a href="{{ route('terminals_payments') }}">Pagos por terminal</a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('reporting.vueltos'))
                            <li>
                                <a href="{{ route('reports.transactions_vuelto') }}">Tickets de devolucion</a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('reporting.vueltos'))
                            <li>
                                <a href="{{ route('reports.vuelto_entregado') }}">Vueltos entregados</a>
                            </li>
                        @endif

                    </ul>

                </li>

                @if (\Sentinel::getUser()->hasAccess('reporting.vueltos'))

                    <li id="lista_one" class="sub-submenu dropend">
                        <a href="#lista2" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed">Miniterminales<svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista2">
                            @if (\Sentinel::getUser()->hasAccess('reporting.estado_contable'))
                                <li>
                                    <a href="{{ route('reporting.estado_contable') }}">Estado Contable</a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('accounting_statement_report'))
                                <li @if (Request::is('accounting_statement*'))  @endif>
                                    <a href="{{ route('accounting_statement') }}">
                                        <span style="">Estado Contable Unificado</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('reporting.miniterminales'))
                                <li @if (Request::is('reporting/resumen_miniterminales*'))  @endif>
                                    <a href="{{ route('reporting.resumen_miniterminales') }}">
                                        <span style="">Estado Contable por Clientes</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('reporting.miniterminales'))
                                <li @if (Request::is('reporting/resumen_detallado_miniterminal*'))  @endif>
                                    <a href="{{ route('reporting.resumen_detallado_miniterminal') }}">
                                        <span style="">Estado Contable Detallado</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('reporting.comisiones'))
                                <li @if (Request::is('reporting/comisiones*'))  @endif>
                                    <a href="{{ route('reporting.comisiones') }}">
                                        <span style="">Comisiones Miniterminales</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('reporting.sales'))
                                <li @if (Request::is('reporting/sales*'))  @endif>
                                    <a href="{{ route('reporting.sales') }}">
                                        <span style="">Ventas Miniterminales</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('reporting.cobranzas'))
                                <li @if (Request::is('reporting/cobranzas*'))  @endif>
                                    <a href="{{ route('reporting.cobranzas') }}">
                                        <span style="">Cobranzas Miniterminales</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('reporting.conciliaciones'))
                                <li @if (Request::is('reporting/conciliations'))  @endif>
                                    <a href="{{ route('reporting.conciliaciones') }}">
                                        <span style="">Conciliaciones Miniterminales</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('reporting.conciliaciones'))
                                <li @if (Request::is('reporting/estados_miniterminales'))  @endif>
                                    <a href="{{ route('reporting.bloqueados') }}">
                                        <span style="">Estados Miniterminales</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('reporting.conciliaciones'))
                                <li @if (Request::is('reporting/historial_bloqueos'))  @endif>
                                    <a href="{{ route('reporting.historial_bloqueos') }}">
                                        <span style="">Historial de Bloqueos</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                @endif

                @if (\Sentinel::getUser()->hasAccess('reporting.negocios'))
                    <li class="sub-submenu dropend">
                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed">Análisis<svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                            <li @if (Request::is('reports/resumen_transacciones*'))  @endif>
                                <a href="{{ route('reports.resumen_transacciones') }}">
                                    <span>Resumen Por ATM</span>
                                </a>
                            </li>
                            <li @if (Request::is('reports/estado_atm*'))  @endif>
                                <a href="{{ route('reports.estado_atm') }}">
                                    <span>Disponibilidad Por ATM</span>
                                </a>
                            </li>
                            <li @if (Request::is('reports/atm_status_history*'))  @endif>
                                <a href="{{ route('reports.atm_status_history') }}">Historial de Estados
                                    ATM</span></a>
                            </li>
                            <li @if (Request::is('reports/transactions_amount*'))  @endif>
                                <a href="{{ route('reports.transactions_amount') }}">
                                    <span>Transacciones por Mes</span>
                                </a>
                            </li>
                            <li @if (Request::is('reports/transactions_atm*'))  @endif>
                                <a href="{{ route('reports.transactions_atm') }}">
                                    <span>Transacciones por ATM</span>
                                </a>
                            </li>
                            <li @if (Request::is('reports/denominaciones_amount*'))  @endif>
                                <a href="{{ route('reports.denominaciones_amount') }}">
                                    <span>Denominaciones Utilizadas</span>
                                </a>
                            </li>
                            <li @if (Request::is('reports/efectividad*'))  @endif>
                                <a href="{{ route('reports.efectividad') }}">
                                    <span>Efectividad</span>
                                </a>
                            </li>
                        </ul>

                    </li>
                @endif

                @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('accounting.admin'))
                    @if (\Sentinel::getUser()->hasAccess('commissions_qr_invoices'))
                        <li @if (Request::is('comisionFactura'))  @endif>
                            <a href="{{ route('comisionFactura') }}">
                                <span>Comisiones Qr Venta</span>
                            </a>
                        </li>
                    @endif
                @endif

                <li class="sub-submenu dropend">
                    <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                        class="dropdown-toggle collapsed">Operaciones Técnicas<svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg> </a>
                    <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                        @if (\Sentinel::getUser()->hasAccess('reporting.arqueos'))
                            <li @if (Request::is('reports/arqueos*'))  @endif>
                                <a href="{{ route('reports.arqueos') }}">
                                    <span>Arqueos</span>
                                </a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('reporting.cargas'))
                            <li @if (Request::is('reports/cargas*'))  @endif>
                                <a href="{{ route('reports.cargas') }}">
                                    <span>Cargas</span>
                                </a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('reporting.dispositivos'))
                            <li @if (Request::is('reports/dispositivos*'))  @endif>
                                <a href="{{ route('reports.dispositivos') }}">
                                    <span>Dispositivos</span>
                                </a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('depositos_arqueos'))
                            <li @if (Request::is('depositos_arqueos*'))  @endif>
                                <a href="{{ route('depositos_arqueos.index') }}">
                                    <span>Dépositos de Arqueos</span>
                                </a>
                            </li>
                        @endif
                    </ul>

                </li>

                @if (\Sentinel::getUser()->hasAccess('reporting.transacciones'))
                    <!--cambiar el acceso -->
                    <li @if (Request::is('reports/installations/*'))  @endif>
                        <a href="{{ route('reports.installations') }}">
                            <span>Instalaciones APP-Billetaje</span>
                        </a>
                    </li>
                @endif

                @if (\Sentinel::getUser()->hasAccess('reporting.contracts_atms'))
                    <li @if (Request::is('reports/contracts/*'))  @endif>
                        <a href="{{ route('reports.contracts') }}">
                            <span>Contratos Miniterminales</span>
                        </a>
                    </li>
                @endif

            </ul>
        </li>
    @endif
    <li class="menu">
        <a href="#elements" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-zap">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                </svg>
                <span>Usuarios y Terminales</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-chevron-right">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
        </a>
        <ul class="dropdown-menu submenu list-unstyled" id="elements" data-bs-parent="#accordionExample">
            @if (\Sentinel::getUser()->hasAccess('atms_per_users_management'))
                <li class="{{ Request::is('atms_per_users_management*') ? 'active' : '' }}">
                    <a href="{{ route('atms_per_users_management') }}"><i class="fa fa-user"></i><span>Gestión de
                            Usuarios</span></a>
                </li>
            @endif
            @if (\Sentinel::getUser()->hasAccess('atms_per_users'))
                <li class="{{ Request::is('atms_per_users') ? 'active' : '' }}">
                    <a href="{{ route('atms_per_users') }}"><i class="fa fa-cubes"></i><span>Terminales por
                            Usuario</span></a>
                </li>
            @endif

            <li class="sub-submenu dropend ">
                <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                    class="dropdown-toggle collapsed"><i class="fa fa-cubes"></i>Atms<svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg> </a>
                <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                    @if (\Sentinel::getUser()->hasAccess('atms'))
                        <li @if (Request::is('atm', 'atm/*') && !Request::is('atm/gooddeals')) class="active" @endif>
                            <a href="{{ route('atm_index') }}"><i class="fa fa-server"></i> <span>ATMs</span></a>
                        </li>
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('atms_parts'))
                        <li @if (Request::is('atms_parts', 'atms_parts/*')) class="active" @endif>
                            <a href="{{ route('atms_parts') }}"><i class="fa fa-server"></i> <span>Partes de
                                    ATMs</span></a>
                        </li>
                    @endif
                </ul>

            </li>

            @if (\Sentinel::getUser()->hasAccess('atms_v2'))
                <li class="sub-submenu dropend ">
                    <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                        class="dropdown-toggle collapsed"><i class="fa fa-cubes"></i>Gestor de terminales<svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg> </a>
                    <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                        <li @if (Request::is('atmnew', 'atmnew/*', 'atm/new/*')) class="active" @endif>
                            <a href="{{ route('atmnew.index') }}">
                                <i class="fa fa-server"></i>
                                <span>ABM miniterminales</span>
                            </a>
                        </li>
                        @if (\Sentinel::getUser()->hasAccess('insurances_form'))
                            <li @if (Request::is('insurances*')) class="active" @endif>
                                <a href="{{ route('insurances.index') }}">
                                    <i class="fa fa-file-powerpoint-o"></i>
                                    <span>Gestor de Pólizas</span>
                                </a>
                            </li>
                        @endif
                    </ul>

                </li>


                @if (\Sentinel::getUser()->hasAnyAccess(['gestor_contratos', 'gestor_contratos.reports', 'reporting.contracts_atms']))

                    <li class="sub-submenu dropend ">
                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"><i class="fa fa-cubes"></i>Gestión | Legales<svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                            @if (\Sentinel::getUser()->hasAccess('gestor_contratos'))
                                <li @if (Request::is('contracts*')) class="active" @endif>
                                    <a href="{{ route('contracts.index') }}">
                                        <i class="fa fa-file-text-o"></i>
                                        <span>Contratos</span>
                                    </a>
                                </li>
                            @endif

                            @if (\Sentinel::getUser()->hasAccess('gestor_contratos.reports'))
                                <li @if (Request::is('reporte/contrato*')) class="active" @endif>
                                    <a href="{{ route('reports.contratos') }}">
                                        <i class="fa fa-file-text-o"></i>
                                        <span>Reporte | Contratos</span>
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </li>

                @endif

                @if (
                    \Sentinel::getUser()->hasAnyAccess([
                        'reports_dms',
                        'caracteristicas_clientes',
                        'categorias*',
                        'canales*',
                        'altas.bancos',
                    ]))

                    <li class="sub-submenu dropend ">
                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"><i class="fa fa-cubes"></i>Clientes<svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                            @if (\Sentinel::getUser()->hasAccess('reports_dms'))
                                <li @if (Request::is('reports/dms', 'reports/dms/*')) class="active" @endif>
                                    <a href="{{ route('reports.dms') }}">
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                        <span>Reporte de Clientes</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('caracteristicas_clientes'))
                                <li @if (Request::is('caracteristicas*', 'caracteristicas/clientes', 'caracteristicas/clientes/*')) class="active" @endif>
                                    <a href="{{ route('caracteristicas.clientes') }}">
                                        <i class="fa fa-cog"></i>
                                        <span>Caracteristicas Clientes</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('canales'))
                                <li @if (Request::is('canales*')) class="active" @endif>
                                    <a href="{{ route('canales.index') }}">
                                        <i class="fa fa-bullhorn"></i>
                                        <span>Canales de venta</span>
                                    </a>
                                </li>
                            @endif

                            @if (\Sentinel::getUser()->hasAccess('categorias'))
                                <li @if (Request::is('categorias*', 'categorias/*')) class="active" @endif>
                                    <a href="{{ route('categorias.index') }}">
                                        <i class="fa fa-bars"></i>
                                        <span>Categorias</span>
                                    </a>
                                </li>
                            @endif

                            @if (\Sentinel::getUser()->hasAccess('bancos'))
                                <li @if (Request::is('bancos*', 'bancos/*')) class="active" @endif>
                                    <a href="{{ route('bancos.index') }}">
                                        <i class="fa fa-university"></i>
                                        <span>Bancos</span>
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </li>

                @endif


                @if (\Sentinel::getUser()->hasAccess('bajas'))
                    <li @if (Request::is('atm/new/baja', 'retiro_dispositivos*', 'notarescision*', 'pagares*', 'notaretiro*')) class="active" @endif>
                        <a href="{{ route('atms.baja') }}">
                            <i class="fa fa-power-off"></i>
                            <span>Baja de miniterminales</span>
                        </a>
                    </li>
                @endif

            @endif

            @if (\Sentinel::getUser()->hasAccess('owner'))
                <li @if (Request::is('owner', 'owner/*')) class="active" @endif>
                    <a href="{{ route('owner.index') }}"><i class="fa fa-sitemap"></i> <span>Redes /
                            Sucursales</span></a>
                </li>
            @endif

            @if (\Sentinel::getUser()->hasAccess('minis_cashout_devolucion_vuelto'))
                <li @if (Request::is('minis.cashout.devolucion.vuelto/*')) class="active" @endif>
                    <a href="{{ route('reports.mini_retiro') }}">
                        <i class="fa fa-money"></i><span>Retiro de Dinero</span>
                    </a>
                </li>
            @endif

        </ul>
    </li>

    <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-minus">
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg><span>TABLES AND FORMS</span></div>
    </li>

    @if (
        \Sentinel::getUser()->hasAccess('pos') ||
            \Sentinel::getUser()->hasAccess('vouchers') ||
            \Sentinel::getUser()->hasAccess('providers') ||
            \Sentinel::getUser()->hasAccess('products') ||
            \Sentinel::getUser()->hasAccess('outcomes') ||
            \Sentinel::getUser()->hasAccess('reversiones_bancard'))

        <li class="menu">
            <a href="#tables" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-layers">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                    <span>Contabilidad</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="dropdown-menu submenu list-unstyled" id="tables" data-bs-parent="#accordionExample">

                @if (\Sentinel::getUser()->hasAccess('pos'))
                    <li @if (Request::is('pos*', 'pointsofsale*')) class="active" @endif>
                        <a href="{{ route('pos.index') }}">
                            <i class="fa fa-desktop"></i><span>Puntos de Venta</span>
                        </a>
                    </li>
                @endif
                @if (\Sentinel::getUser()->hasAccess('vouchers'))
                    <li @if (Request::is('vouchers*')) class="active" @endif>
                        <a href="{{ route('vouchers.index') }}">
                            <i class="fa fa-list-alt"></i><span>Tipos de Comprobante</span>
                        </a>
                    </li>
                @endif
                @if (\Sentinel::getUser()->hasAccess('providers'))
                    <li @if (Request::is('providers*')) class="active" @endif>
                        <a href="{{ route('providers.index') }}">
                            <i class="fa fa-truck"></i><span>Proveedores</span>
                        </a>
                    </li>
                @endif
                @if (\Sentinel::getUser()->hasAccess('products'))
                    <li @if (Request::is('products*')) class="active" @endif>
                        <a href="{{ route('products.index') }}">
                            <i class="fa fa-shopping-cart"></i><span>Productos</span>
                        </a>
                    </li>
                @endif
                @if (\Sentinel::getUser()->hasAccess('outcomes'))
                    <li @if (Request::is('outcome*')) class="active" @endif>
                        <a href="{{ route('outcome.index') }}">
                            <i class="fa fa-shopping-cart"></i><span>Entidades Externas</span>
                        </a>
                    </li>
                @endif
                @if (\Sentinel::getUser()->hasAccess('reversiones_bancard'))
                    <li @if (Request::is('reversiones*')) class="active" @endif>
                        <a href="{{ route('reversiones.index') }}">
                            <i class="fa fa-undo"></i><span>Reversiones Bancard</span>
                        </a>
                    </li>
                @endif

            </ul>
        </li>

    @endif

    @if (\Sentinel::getUser()->hasAccess('applications'))
        <li class="menu">
            <a href="#forms" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-clipboard">
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                        <rect x="8" y="2" width="8" height="4" rx="1"
                            ry="1"></rect>
                    </svg>
                    <span>Aplicaciones</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="dropdown-menu submenu list-unstyled" id="forms" data-bs-parent="#accordionExample">
                <li @if (Request::is('applications', 'applications/*', 'screens', 'screens/*')) class="active" @endif><a
                        href="{{ route('applications.index') }}"><i class="fa fa-cube"></i>
                        <span>Gestor de Aplicaciones</span></a>
                </li>
                <li @if (Request::is('app_updates', 'app_updates/*')) class="active" @endif><a
                        href="{{ route('app_updates.index') }}"><i class="fa fa-cube"></i>
                        <span>Gestor de actualizaciones</span></a>
                </li>
                <li @if (Request::is('token_dropbox', 'token_dropbox/*')) class="active" @endif><a
                        href="{{ url('token_dropbox/-1/edit') }}"><i class="fa fa-qrcode"></i>
                        <span>Gestor de Token/Dropbox</span></a>
                </li>

                @if (
                    \Sentinel::getUser()->hasAnyAccess([
                        'webservices',
                        'webservices.providers',
                        'webservices.providers.add|edit',
                        'webservices.providers.delete',
                        'atms.update_gooddeal',
                        'marcas',
                        'servicio_marca',
                        'marca.grilla',
                        'marca.consolidar',
                        'marca.order',
                    ]))
                    <li class="sub-submenu dropend ">
                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"><i class="fa fa-cubes"></i>Servicios Web<svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">

                            @if (\Sentinel::getUser()->hasAccess('webservices.providers'))
                                <li @if (Request::is('wsproviders*')) class="active" @endif>
                                    <a href="{{ route('wsproviders.index') }}"><i class="fa fa-cube"></i>
                                        <span>Proveedores</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('webservices.products'))
                                <li @if (Request::is('wsproducts*')) class="active" @endif>
                                    <a href="{{ route('wsproducts.index') }}"><i class="fa fa-cube"></i>
                                        <span>Productos/Operaciones</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('webservices'))
                                <li @if (Request::is('webservices*')) class="active" @endif>
                                    <a href="{{ route('webservices.index') }}"><i class="fa fa-cube"></i> <span>Web
                                            Services</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('atms.update_gooddeal'))
                                <li @if (Request::is('atm/gooddeals')) class="active" @endif>
                                    <a href="{{ route('gooddeals.update') }}"><i class="fa fa-cube"></i> <span>Act.
                                            Promociones</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('marca'))
                                <li @if (Request::is('marca*') && !Request::is('marca/consolidar', 'marca/order', 'marca/grilla_servicios')) class="active" @endif>
                                    <a href="{{ route('marca.index') }}"><i class="fa fa-cube"></i>
                                        <span>Marcas</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('servicio_marca'))
                                <li @if (Request::is('servicios_marca*')) class="active" @endif>
                                    <a href="{{ route('servicios_marca.index') }}"><i class="fa fa-cube"></i>
                                        <span>Servicios Por Marca</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('marca.grilla'))
                                <li @if (Request::is('marca/grilla_servicios')) class="active" @endif>
                                    <a href="{{ route('marca.grilla_servicios') }}"><i class="fa fa-cube"></i>
                                        <span>Grilla de Servicios</span></a>
                                </li>
                            @endif
                            {{-- @if (\Sentinel::getUser()->hasAccess('marca.consolidar'))
                                                <li @if (Request::is('marca/consolidar')) class="active" @endif>
                                                    <a href="{{ route('marca.consolidar') }}"><i class="fa fa-cube"></i> <span>Consolidar
                                                            Marcas</span></a>
                                                </li>
                                            @endif --}}
                            @if (\Sentinel::getUser()->hasAccess('marca.order'))
                                <li @if (Request::is('marca/order')) class="active" @endif>
                                    <a href="{{ route('marca.order') }}"><i class="fa fa-cube"></i> <span>Ordenar
                                            Marcas</span></a>
                                </li>
                            @endif

                        </ul>

                    </li>
                @endif

                <li class="sub-submenu dropend ">
                    <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                        class="dropdown-toggle collapsed"><i class="fa fa-cubes"></i>Reglas<svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg> </a>
                    <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                        @if (\Sentinel::getUser()->hasAccess('params_rules'))
                            <li @if (Request::is('params_rules*')) class="active" @endif">
                                <a href="{{ route('params_rules.index') }}"><i
                                        class="fa fa-edit"></i></i><span>Parámetros</span></a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('services_rules'))
                            <li @if (Request::is('services_rules*')) class="active" @endif>
                                <a href="{{ route('services_rules.index') }}"><i
                                        class="fa fa-object-group"></i></i><span>Reglas de Servicios</span></a>
                            </li>
                        @endif
                        @if (\Sentinel::getUser()->hasAccess('references_rules'))
                            <li @if (Request::is('references*')) class="active" @endif>
                                <a href="{{ route('references.index') }}"><i
                                        class="fa fa-phone"></i></i><span>Referencias</span></a>
                            </li>
                        @endif
                    </ul>

                </li>

                @if (\Sentinel::getUser()->hasAccess('depositos_boletas', 'depositos_boletas.conciliations', 'depositos_cuotas'))
                    <li class="sub-submenu dropend ">
                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"><i class="fa fa-cubes"></i>Gestor de Boletas<svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                            <li @if (Request::is('depositos_boletas', 'depositos_boletas/*', 'screens', 'screens/*')) class="active" @endif><a
                                    href="{{ route('depositos_boletas.index') }}"><i class="fa fa-ticket"></i>
                                    <span>Deposito de Boletas</span></a>
                            </li>
                            <?php
                            $housing = \DB::table('atms')
                                ->select('atms.housing_id')
                                ->join('points_of_sale', 'atms.id', '=', 'points_of_sale.atm_id')
                                ->join('branches', 'branches.id', '=', 'points_of_sale.branch_id')
                                ->join('venta_housing', 'atms.housing_id', '=', 'venta_housing.housing_id')
                                ->join('venta', 'venta.id', '=', 'venta_housing.venta_id')
                                ->where('branches.user_id', \Sentinel::getUser()->id)
                                ->where('venta.tipo_venta', 'cr')
                                ->first();
                            ?>

                            @if (
                                !empty($housing) ||
                                    (\Sentinel::getUser()->inRole('superuser') ||
                                        \Sentinel::getUser()->inRole('accounting.admin') ||
                                        \Sentinel::getUser()->inRole('mantenimiento.operativo')))
                                <li @if (Request::is('depositos_cuotas', 'depositos_cuotas/*', 'screens', 'screens/*')) class="active" @endif><a
                                        href="{{ route('depositos_cuotas.index') }}"><i class="fa fa-tasks"></i>
                                        <span>Pago de Cuotas</span></a>
                                </li>

                                @if (\Sentinel::getUser()->inRole('mini_terminal'))
                                    <li @if (Request::is('reporting.depositos_cuotas', 'reporting.depositos_cuotas/*', 'screens', 'screens/*')) class="active" @endif>
                                        <a href="{{ route('reporting.depositos_cuotas') }}">
                                            <i class="fa fa-tags"></i><span>Reporte de Cuotas</span>
                                        </a>
                                    </li>
                                @endif
                            @endif

                            <?php
                            $housing_alquiler = \DB::table('atms')
                                ->select('atms.housing_id')
                                ->join('points_of_sale', 'atms.id', '=', 'points_of_sale.atm_id')
                                ->join('branches', 'branches.id', '=', 'points_of_sale.branch_id')
                                ->join('alquiler_housing', 'atms.housing_id', '=', 'alquiler_housing.housing_id')
                                ->join('alquiler', 'alquiler.id', '=', 'alquiler_housing.alquiler_id')
                                ->where('branches.user_id', \Sentinel::getUser()->id)
                                ->first();
                            ?>
                            @if (
                                !empty($housing_alquiler) ||
                                    (\Sentinel::getUser()->inRole('superuser') ||
                                        \Sentinel::getUser()->inRole('accounting.admin') ||
                                        \Sentinel::getUser()->inRole('mantenimiento.operativo')))
                                <li @if (Request::is('depositos_alquileres', 'depositos_alquileres/*', 'screens', 'screens/*')) class="active" @endif><a
                                        href="{{ route('depositos_alquileres.index') }}"><i class="fa fa-tasks"></i>
                                        <span>Pago de Alquiler</span></a>
                                </li>
                            @endif
                            @if (!\Sentinel::getUser()->inRole('mini_terminal') && !\Sentinel::getUser()->inRole('supervisor_miniterminal'))
                                <li @if (Request::is('boletas_conciliations*')) class="active" @endif><a
                                        href="{{ route('boletas.conciliations') }}"><i class="fa fa-ticket"></i>
                                        <span>Conciliaciones de Boletas</span></a>
                                </li>
                            @endif

                            <li @if (Request::is('reporting/boletas_depositos*')) class="active" @endif>
                                <a href="{{ route('reporting.boletas_depositos') }}">
                                    <i class="fa fa-tags"></i><span>Reporte de Depositos</span>
                                </a>
                            </li>

                            <li @if (Request::is('reporting/boletas_enviadas*')) class="active" @endif>
                                <a href="{{ route('reporting.boletas_enviadas') }}">
                                    <i class="fa fa-tags"></i><span>Reporte de Boletas Enviadas</span>
                                </a>
                            </li>

                            @if (empty($housing) ||
                                    (\Sentinel::getUser()->inRole('superuser') ||
                                        \Sentinel::getUser()->inRole('accounting.admin') ||
                                        \Sentinel::getUser()->inRole('mantenimiento.operativo')))
                                <li @if (Request::is('depositos_cuotas', 'depositos_cuotas/*', 'screens', 'screens/*')) class="active" @endif>
                                    <a href="{{ route('reporting.depositos_cuotas') }}">
                                        <i class="fa fa-tags"></i><span>Reporte de Cuotas</span>
                                    </a>
                                </li>
                            @endif

                            @if (
                                !empty($housing_alquiler) ||
                                    (\Sentinel::getUser()->inRole('superuser') ||
                                        \Sentinel::getUser()->inRole('accounting.admin') ||
                                        \Sentinel::getUser()->inRole('mantenimiento.operativo')))
                                <li @if (Request::is('depositos_cuotas', 'depositos_cuotas/*', 'screens', 'screens/*')) class="active" @endif>
                                    <a href="{{ route('reporting.depositos_alquileres') }}">
                                        <i class="fa fa-tags"></i><span>Reporte de Alquiler</span>
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </li>
                @endif

                @if (\Sentinel::getUser()->hasAccess('cms_transactions_devolutions'))
                    <li class="sub-submenu dropend ">
                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="dropdown-toggle collapsed"><i class="fa fa-cubes"></i>Devoluciones<svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                            @if (!\Sentinel::getUser()->inRole('cms_transactions_report'))
                                <li @if (Request::is('cms_transactions_index*')) class="active" @endif>
                                    <a href="{{ route('cms_transactions_index') }}">
                                        <i class="fa fa-clone"></i><span>Realizar devolución</span>
                                    </a>
                                </li>
                            @endif

                            @if (!\Sentinel::getUser()->inRole('cms_transactions_report_devolution'))
                                <li @if (Request::is('cms_transactions_index_devolutions*')) class="active" @endif>
                                    <a href="{{ route('cms_transactions_index_devolutions') }}">
                                        <i class="fa fa-list"></i><span>Devoluciones realizadas</span>
                                    </a>
                                </li>
                            @endif

                            @if (!\Sentinel::getUser()->inRole('cms_services_with_more_returns'))
                                <li @if (Request::is('cms_services_with_more_returns_index*')) class="active" @endif>
                                    <a href="{{ route('cms_services_with_more_returns_index') }}">
                                        <i class="fa fa-list"></i><span>Servicios con más demanda</span>
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </li>
                @endif

            </ul>
        </li>
    @endif

    {{-- <li class="menu">
                        <a href="#pages" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                <span>Pages</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-unstyled" id="pages" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./pages-knowledge-base.html"> Knowledge Base </a>
                            </li>
                            <li>
                                <a href="./pages-faq.html"> FAQ </a>
                            </li>
                            <li>
                                <a href="./pages-contact-us.html"> Contact Form </a>
                            </li>
                            <li>
                                <a href="./user-profile.html"> Users </a>
                            </li>
                            <li>
                                <a href="./user-account-settings.html"> Account Settings </a>
                            </li>
                            <li>
                                <a href="./pages-error404.html" target="_blank"> Error </a>
                            </li>
                            <li>
                                <a href="./pages-maintenence.html" target="_blank"> Maintanence </a>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#login" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Sign In <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="login" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-signin.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-signin.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#signup" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Sign Up <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="signup" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-signup.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-signup.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#unlock" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Unlock <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="unlock" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-lockscreen.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-lockscreen.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#reset" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Reset <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="reset" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-password-reset.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-password-reset.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#twoStep" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Two Step <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="twoStep" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-2-step-verification.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-2-step-verification.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

    {{-- <li class="menu">
                        <a href="#more" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                <span>More</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-unstyled" id="more" data-bs-parent="#accordionExample">

                            <li>
                                <a href="./map-leaflet.html"> Maps </a>
                            </li>
                            <li>
                                <a href="./charts-apex.html"> Charts </a>
                            </li>
                            <li>
                                <a href="./widgets.html"> Widgets </a>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#layouts" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Layouts <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="layouts" data-bs-parent="#more"> 
                                    <li>
                                        <a href="./layout-blank-page.html"> Blank Page </a>
                                    </li>
                                    <li>
                                        <a href="./layout-empty.html"> Empty Page </a>
                                    </li>
                                    <li>
                                        <a href="./layout-full-width.html"> Full Width </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a target="_blank" href="../../documentation/index.html"> Documentation </a>
                            </li>
                            <li>
                                <a target="_blank" href="../../documentation/changelog.html"> Changelog </a>
                            </li>
                            
                        </ul>
                    </li> --}}

</ul>
