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
        }


</script>