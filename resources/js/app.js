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

function previewGambar(event) {
    const input = event.target;
    const reader = new FileReader();

    reader.onload = function () {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.classList.remove('hidden');
    }

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}