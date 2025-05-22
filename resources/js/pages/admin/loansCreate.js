export function init() {
    new TomSelect('#select-book', {
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        }
    });

    new TomSelect('#select-user', {
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        }
    });

    new TomSelect('#select-admin', {
        create: true,
        sortField: {
            field: 'text',
            direction: 'asc'
        }
    });
}