export const menuItems = [
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
    }
    // Agrega más elementos del menú aquí
];
