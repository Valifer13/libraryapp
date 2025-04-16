const page = document.body.dataset.page;

switch (page) {
    case 'admin-dashboard':
        import ('./pages/admin/dashboard').then(module => module.init());
        break;
    case 'admin-loans-edit':
        import ('./pages/admin/loansEdit').then(module => module.init());
        break;
    default:
        console.log('No page-specific JS loaded.');
        break;
}