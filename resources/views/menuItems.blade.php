<script>

  menuItems = [
    {
        name: 'Dashboard',
        link: "{{ route('home') }}",
        requiredPermission: ['departamentoss','monitoreo']
    },
    {
        name: 'Analitica',
        link: "{{ route('analitica') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Usuarios',
        link: "{{ route('users.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Roles',
        link: "{{ route('roles.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Roles Reporte',
        link: "{{ route('roles_report') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Permisos',
        link: "{{ route('permissions.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Usuarios Bahia',
        link: "{{ route('usuarios_bahia.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Departamentos',
        link: "{{ route('departamentos.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Ciudades',
        link: "{{ route('ciudades.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Barrios',
        link: "{{ route('barrios.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Configurar Alertas',
        link: "{{ route('notifications_params.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Parametros de Comisiones',
        link: "{{ route('parametros_comisiones.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Grupos',
        link: "{{ route('groups.index') }}",
        requiredPermission: ['monitoreo']
    },
    {
        name: 'Venta Miniterminal',
        link: "{{ route('venta.index') }}",
        requiredPermission: ['ventas','pago_clientes','descuento_comision']
    },
    {
        name: 'Alquiler Miniterminal',
        link: "{{ route('alquiler.index') }}",
        requiredPermission: ['ventas','pago_clientes','descuento_comision']
    },
    {
        name: 'Cuotas de Alquiler',
        link: "{{ route('reporting.cuotas_alquiler') }}",
        requiredPermission: ['ventas','pago_clientes','descuento_comision']
    },
    {
        name: 'Descuento por Comision',
        link: "{{ route('recibos_comisiones.index') }}",
        requiredPermission: ['ventas','pago_clientes','descuento_comision']
    },
    {
        name: 'Generar Pago de clientes',
        link: "{{ route('pago_clientes') }}",
        requiredPermission: ['pago_clientes']
    },
    {
        name: 'Confirmar Pagos',
        link: "{{ route('pago_clientes.register_pago') }}",
        requiredPermission: ['pago_clientes.import_pago']
    },
    {
        name: 'Reporte de Pagos',
        link: "{{ route('reporting.pago_cliente') }}",
        requiredPermission: ['pago_clientes']
    },
    {
        name: 'Marcas - Modelos',
        link: "{{ route('brands.index') }}",
        requiredPermission: ['housing']
    },
    {
        name: 'Housing',
        link: "{{ route('miniterminales.index') }}",
        requiredPermission: ['housing']
    },
    {
        name: 'Listado de dispositivos',
        link: "{{ route('devices.showGet') }}",
        requiredPermission: ['housing']
    },
    {
        name: 'Compra de Saldo',
        link: "{{ route('compra_tarex.index') }}",
        requiredPermission: ['compra_tarex']
    },
    {
        name: 'Historico Transacciones',
        link: "{{ route('reports.transactions') }}",
        requiredPermission: ['reporting.transacciones']
    },
    {
        name: 'Transacciones del Día',
        link: "{{ route('reports.one_day_transactions') }}",
        requiredPermission: ['reporting.transacciones']
    },
    {
        name: 'Pagos',
        link: "{{ route('reports.payments') }}",
        requiredPermission: ['reporting.payments']
    },
    {
        name: 'Pagos por terminal',
        link: "{{ route('terminals_payments') }}",
        requiredPermission: ['superuser']
    },
    {
        name: 'Tickets de devolucion',
        link: "{{ route('reports.transactions_vuelto') }}",
        requiredPermission: ['reporting.vueltos']
    },
    {
        name: 'Vueltos entregados',
        link: "{{ route('reports.vuelto_entregado') }}",
        requiredPermission: ['reporting.vueltos']
    },
    {
        name: 'Estado Contable',
        link: "{{ route('reporting.estado_contable') }}",
        requiredPermission: ['reporting.estado_contable']
    },
    {
        name: 'Estado Contable Unificado',
        link: "{{ route('accounting_statement') }}",
        requiredPermission: ['accounting_statement_report']
    },
    {
        name: 'Estado Contable por Clientes',
        link: "{{ route('reporting.resumen_miniterminales') }}",
        requiredPermission: ['reporting.miniterminales']
    },
    {
        name: 'Estado Contable Detallado',
        link: "{{ route('reporting.resumen_detallado_miniterminal') }}",
        requiredPermission: ['reporting.miniterminales']
    },
    {
        name: 'Comisiones Miniterminales',
        link: "{{  route('reporting.comisiones') }}",
        requiredPermission: ['reporting.comisiones']
    },
    {
        name: 'Ventas Miniterminales',
        link: "{{  route('reporting.sales') }}",
        requiredPermission: ['reporting.sales']
    },
    {
        name: 'Cobranzas Miniterminales',
        link: "{{  route('reporting.cobranzas') }}",
        requiredPermission: ['reporting.cobranzas']
    },
    {
        name: 'Conciliaciones Miniterminales',
        link: "{{  route('reporting.conciliaciones') }}",
        requiredPermission: ['reporting.conciliaciones']
    },
    {
        name: 'Estados Miniterminales',
        link: "{{   route('reporting.bloqueados')  }}",
        requiredPermission: ['reporting.conciliaciones']
    },
    {
        name: 'Historial de Bloqueos',
        link: "{{   route('reporting.historial_bloqueos')  }}",
        requiredPermission: ['reporting.conciliaciones']
    },

    {
        name: 'Resumen Por ATM',
        link: "{{ route('reports.resumen_transacciones') }}",
        requiredPermission: ['reporting.vueltos']
    },
    {
        name: 'Disponibilidad Por ATM',
        link: "{{ route('reports.estado_atm') }}",
        requiredPermission: ['reporting.vueltos']
    },
    {
        name: 'Historial de Estados ATM',
        link: "{{ route('reports.atm_status_history') }}",
        requiredPermission: ['reporting.vueltos']
    },
    {
        name: 'Transacciones por Mes',
        link: "{{ route('reports.transactions_amount') }}",
        requiredPermission: ['reporting.vueltos']
    },
    {
        name: 'Transacciones por ATM',
        link: "{{ route('reports.transactions_atm') }}",
        requiredPermission: ['reporting.vueltos']
    },
    {
        name: 'Denominaciones Utilizadas',
        link: "{{ route('reports.denominaciones_amount') }}",
        requiredPermission: ['reporting.vueltos']
    },
    {
        name: 'Efectividad',
        link: "{{ route('reports.efectividad') }}",
        requiredPermission: ['reporting.vueltos']
    },

    {
        name: 'Comisiones Qr Venta',
        link: "{{ route('comisionFactura') }}",
        requiredPermission: ['commissions_qr_invoices']
    },

    {
        name: 'Arqueos',
        link: "{{ route('reports.arqueos') }}",
        requiredPermission: ['reporting.arqueos']
    },
    {
        name: 'Cargas',
        link: "{{ route('reports.cargas') }}",
        requiredPermission: ['reporting.cargas']
    },
    {
        name: 'Dispositivos',
        link: "{{ route('reports.dispositivos') }}",
        requiredPermission: ['reporting.dispositivos']
    },
    {
        name: 'Dépositos de Arqueos',
        link: "{{ route('depositos_arqueos.index') }}",
        requiredPermission: ['depositos_arqueos']
    },

    {
        name: 'Instalaciones APP-Billetaje',
        link: "{{ route('reports.installations') }}",
        requiredPermission: ['reporting.transacciones']
    },
    {
        name: 'Contratos Miniterminales',
        link: "{{ route('reports.contracts') }}",
        requiredPermission: ['reporting.contracts_atms']
    },

    {
        name: 'Gestión de Usuarios',
        link: "{{ route('atms_per_users_management') }}",
        requiredPermission: ['atms_per_users_management']
    },
    {
        name: 'Terminales por Usuario',
        link: "{{ route('atms_per_users') }}",
        requiredPermission: ['atms_per_users']
    },

    {
        name: 'ATMs',
        link: "{{ route('atm_index') }}",
        requiredPermission: ['atms']
    },
    {
        name: 'Partes de ATMs',
        link: "{{ route('atms_parts') }}",
        requiredPermission: ['atms_parts']
    },

    {
        "name": "ABM miniterminales",
        "link": "{{ route('atmnew.index') }}",
        "requiredPermission": ["atms_v2"]
    },
    {
        "name": "Gestor de Pólizas",
        "link": "{{ route('insurances.index') }}",
        "requiredPermission": ["insurances_form"]
    },
    {
        "name": "Contratos",
        "link": "{{ route('contracts.index') }}",
        "requiredPermission": ["gestor_contratos"]
    },
    {
        "name": "Reporte | Contratos",
        "link": "{{ route('reports.contratos') }}",
        "requiredPermission": ["gestor_contratos.reports"]
    },
    {
        "name": "Reporte de Clientes",
        "link": "{{ route('reports.dms') }}",
        "requiredPermission": ["reports_dms"]
    },
    {
        "name": "Caracteristicas Clientes",
        "link": "{{ route('caracteristicas.clientes') }}",
        "requiredPermission": ["caracteristicas_clientes"]
    },
    {
        "name": "Canales de venta",
        "link": "{{ route('canales.index') }}",
        "requiredPermission": ["canales"]
    },
    {
        "name": "Categorias",
        "link": "{{ route('categorias.index') }}",
        "requiredPermission": ["categorias"]
    },
    {
        "name": "Bancos",
        "link": "{{ route('bancos.index') }}",
        "requiredPermission": ["bancos"]
    },
    {
        "name": "Baja de miniterminales",
        "link": "{{ route('atms.baja') }}",
        "requiredPermission": ["bajas"]
    },
    {
        "name": "Redes / Sucursales",
        "link": "{{ route('owner.index') }}",
        "requiredPermission": ["owner"]
    },
    {
        "name": "Retiro de Dinero",
        "link": "{{ route('reports.mini_retiro') }}",
        "requiredPermission": ["minis_cashout_devolucion_vuelto"]
    },
    {
        "name": "Puntos de Venta",
        "link": "{{ route('pos.index') }}",
        "requiredPermission": ["pos"]
    },
    {
        "name": "Tipos de Comprobante",
        "link": "{{ route('vouchers.index') }}",
        "requiredPermission": ["vouchers"]
    },
    {
        "name": "Proveedores",
        "link": "{{ route('providers.index') }}",
        "requiredPermission": ["providers"]
    },
    {
        "name": "Productos",
        "link": "{{ route('products.index') }}",
        "requiredPermission": ["products"]
    },
    {
        "name": "Entidades Externas",
        "link": "{{ route('outcome.index') }}",
        "requiredPermission": ["outcomes"]
    },
    {
        "name": "Reversiones Bancard",
        "link": "{{ route('reversiones.index') }}",
        "requiredPermission": ["reversiones_bancard"]
    },
    {
        "name": "Gestor de Aplicaciones",
        "link": "{{ route('applications.index') }}",
        "requiredPermission": ["applications"]
    },
    {
        "name": "Gestor de actualizaciones",
        "link": "{{ route('app_updates.index') }}",
        "requiredPermission": ["applications"]
    },
    {
        "name": "Gestor de Token/Dropbox",
        "link": "{{ url('token_dropbox/-1/edit') }}",
        "requiredPermission": ["applications"]
    },
    {
        "name": "Proveedores",
        "link": "{{ route('wsproviders.index') }}",
        "requiredPermission": ["webservices.providers"]
    },
    {
        "name": "Productos/Operaciones",
        "link": "{{ route('wsproducts.index') }}",
        "requiredPermission": ["webservices.products"]
    },
    {
        "name": "Web Services",
        "link": "{{ route('webservices.index') }}",
        "requiredPermission": ["webservices"]
    },
    {
        "name": "Act. Promociones",
        "link": "{{ route('gooddeals.update') }}",
        "requiredPermission": ["atms.update_gooddeal"]
    }, 
    {
        "name": "Marcas",
        "link": "{{ route('marca.index') }}",
        "requiredPermission": ["marca"]
    },
    {
        "name": "Servicios Por Marca",
        "link": "{{ route('servicios_marca.index') }}",
        "requiredPermission": ["servicio_marca"]
    },
    {
        "name": "Grilla de Servicios",
        "link": "{{ route('marca.grilla_servicios') }}",
        "requiredPermission": ["marca.grilla"]
    },
    {
        "name": "Ordenar Marcas",
        "link": "{{ route('marca.order') }}",
        "requiredPermission": ["marca.order"]
    },
    {
        "name": "Parámetros",
        "link": "{{ route('params_rules.index') }}",
        "requiredPermission": ["params_rules"]
    },
    {
        "name": "Reglas de Servicios",
        "link": "{{ route('services_rules.index') }}",
        "requiredPermission": ["services_rules"]
    },
    {
        "name": "Referencias",
        "link": "{{ route('references.index') }}",
        "requiredPermission": ["references_rules"]
    },
        //deposito boletas
    {
        "name": "Deposito de Boletas",
        "link": "{{ route('depositos_boletas.index') }}",
        "requiredPermission": ["depositos_boletas"]
    },
    {
        "name": "Pago de Cuotas",
        "link": "{{ route('depositos_cuotas.index') }}",
        "requiredPermission": ["superuser","accounting.admin","mantenimiento.operativo"]
    },
    {
        "name": "Reporte de Cuotas",
        "link": "{{ route('reporting.depositos_cuotas') }}",
        "requiredPermission": ["superuser","accounting.admin","mantenimiento.operativo"]
    },
    {
        "name": "Pago de Alquiler",
        "link": "{{ route('depositos_alquileres.index') }}",
        "requiredPermission": ["superuser","accounting.admin","mantenimiento.operativo"]
    },
    {
        "name": "Conciliaciones de Boletas",
        "link": "{{ route('boletas.conciliations') }}",
        "requiredPermission": ["mini_terminal", "supervisor_miniterminal"]
    },
    {
        "name": "Reporte de Depositos",
        "link": "{{ route('reporting.boletas_depositos') }}",
        "requiredPermission": ["depositos_boletas"]
    },
    {
        "name": "Reporte de Boletas Enviadas",
        "link": "{{ route('reporting.boletas_enviadas') }}",
        "requiredPermission": ["depositos_boletas"]
    },
    {
        "name": "Reporte de Cuotas",
        "link": "{{ route('reporting.depositos_cuotas') }}",
        "requiredPermission": ["superuser","accounting.admin","mantenimiento.operativo"]
    },
    {
        "name": "Reporte de Alquiler",
        "link": "{{ route('reporting.depositos_alquileres') }}",
        "requiredPermission": ["superuser","accounting.admin","mantenimiento.operativo"]
    },

    {
        "name": "Realizar devolución",
        "link": "{{ route('cms_transactions_index') }}",
        "requiredPermission": ["cms_transactions_report"]
    },
    {
        "name": "Devoluciones realizadas",
        "link": "{{ route('cms_transactions_index_devolutions') }}",
        "requiredPermission": ["cms_transactions_report_devolution"]
    },
    {
        "name": "Servicios con más demanda",
        "link": "{{ route('cms_services_with_more_returns_index') }}",
        "requiredPermission": ["cms_services_with_more_returns"]
    },
    {
        "name": "Saldos en línea",
        "link": "{{ route('reports.saldos') }}",
        "requiredPermission": ["saldos_linea"]
    },
    {
        "name": "Control Contable",
        "link": "{{ route('saldos.contable') }}",
        "requiredPermission": ["saldos_linea"]
    },
    {
        "name": "Teléfonos",
        "link": "{{ route('ussd_phone_report') }}",
        "requiredPermission": ["ussd_phone_report"]
    },
    {
        "name": "Menú y Opciones",
        "link": "{{ route('ussd_option_report') }}",
        "requiredPermission": ["ussd_option_report"]
    },
    {
        "name": "Transacciones",
        "link": "{{ route('ussd_transaction_report') }}",
        "requiredPermission": ["ussd_transaction_report"]
    },
    {
        "name": "Lista negra",
        "link": "{{ route('ussd_black_list_report') }}",
        "requiredPermission": ["ussd_black_list_report"]
    },
    {
        "name": "Conciliador de boletas",
        "link": "{{ route('ballot_conciliator') }}",
        "requiredPermission": ["ballot_conciliator"]
    },
    {
        "name": "Conciliador de transacciones",
        "link": "{{ route('transaction_conciliator') }}",
        "requiredPermission": ["transaction_conciliator"]
    },

    // Agrega más elementos del menú aquí
];


 // script.js
       // Obtén el elemento HTML con los datos de permisos
        const userPermisosElement = document.getElementById('user-permisos');

        // Accede a los datos de permisos almacenados en el atributo data-permisos
        const userPermisos = JSON.parse(userPermisosElement.getAttribute('data-permisos'));
        const userPermisosArray = Object.keys(userPermisos);
      
        const searchInput = document.getElementById('searchInput');
        const menuList = document.getElementById('menuList');
       


        // Filtrar el array de objetos en base a los permisos del usuario
        const filteredMenuItems = menuItems.filter(item => {
            return item.requiredPermission.some(permission => userPermisosArray.includes(permission));
        });

        

        searchInput.addEventListener('input', () => {

            clearList(menuList);

            const searchTerm = searchInput.value.toLowerCase();
            const search = searchInput.value.trim();
            console.log(search);
            // Filtrar los elementos del menú
            const filteredItems = filteredMenuItems.filter(item => item.name.toLowerCase().includes(searchTerm));

            // Limpiar la lista de resultados antes de cada búsqueda


            if (search == "" || filteredItems.length === 0) {
                menuList.style.display = "none";
                clearList(menuList);
                return
            }
            // Crear elementos de lista y enlaces para los elementos filtrad

            menuList.style.display = "block";

            filteredItems.forEach(filteredItem => {
                const a = document.createElement('a');
                a.href = filteredItem.link;
                a.textContent = filteredItem.name;
                a.classList.add('list-group-item', 'list-group-item-action','buscador-cms');
                menuList.appendChild(a);
            });

        });


        // Función para borrar todos los elementos de la lista
        function clearList(myDiv) {
            while (myDiv.firstChild) {
                myDiv.removeChild(myDiv.firstChild);
            }

             // Resetear el índice seleccionado cada vez que la lista se limpia
                selectedIndex = -1;
        }


        /*EVENTO DEL TECLADO*/

            let selectedIndex = -1; // Inicialmente, ningún elemento está seleccionado

            let items = [];

            searchInput.addEventListener('keydown', (event) => {
                items = menuList.querySelectorAll('a');

                if (event.key === 'ArrowDown') {
                    event.preventDefault();
                    selectedIndex = (selectedIndex + 1) % filteredMenuItems.length;
                   
                    updateHighlightedItem(items[selectedIndex]);
                    scrollIntoView(items[selectedIndex]);

                } else if (event.key === 'ArrowUp') {
                    event.preventDefault();
                    selectedIndex = (selectedIndex - 1 + filteredMenuItems.length) % filteredMenuItems.length;
                   
                    updateHighlightedItem(items[selectedIndex]);
                    scrollIntoView(items[selectedIndex]);
                    
                } else if (event.key === 'Enter' && selectedIndex >= 0) {
                    event.preventDefault(); 
                    console.log(items[selectedIndex].href);
                    window.location.href = items[selectedIndex].href;
                }
            });

            function updateHighlightedItem(selectedItem) {
                console.log(selectedItem);
                // Quitar el resaltado del elemento previamente resaltado
      
                items.forEach((data) => {
                    data.classList.remove('highlighted');
                });

                

                // Resaltar el elemento seleccionado
                selectedItem.classList.add('highlighted');
            }

            function scrollIntoView(element) {
                const elementRect = element.getBoundingClientRect();
                const menuListRect = menuList.getBoundingClientRect();

                if (elementRect.top < menuListRect.top) {
                    // Elemento fuera de la parte superior de la lista
                    menuList.scrollTop -= (menuListRect.top - elementRect.top);
                } else if (elementRect.bottom > menuListRect.bottom) {
                    // Elemento fuera de la parte inferior de la lista
                    menuList.scrollTop += (elementRect.bottom - menuListRect.bottom);
                }
            }




        /*FIN DEL EVENTO DEL TECLADO*/


</script>

