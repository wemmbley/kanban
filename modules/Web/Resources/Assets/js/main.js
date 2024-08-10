$select2 = function(identifier, parent = null, wireComponent = null, wireField = null) {
    $(identifier).select2({
        theme: 'bootstrap',
        dropdownParent: (parent === null) ? '' : $(parent)
    }).on('change', function (e) {
        if(wireComponent === null) {
            return;
        }

        wireComponent.set(wireField, $(this).val())
    });
}

$destroySelect2 = function(fields) {
    // if we got an array
    if(typeof fields === 'object') {
        fields.forEach((item) => {
            $(item).select2('destroy');
        });
    } else {
        // else we got one el
        $(fields).select2('destroy');
    }
}

$wireGetComponent = function (id) {
    const componentId = document.querySelector(id);

    return Livewire.find(componentId.getAttribute('wire:id'));
}

$toastSuccess = function(text) {
    const background = 'linear-gradient(to right, #00b09b, #96c93d)';

    toast(text, background)
}
$toastDanger = function(text) {
    const background = 'linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 27%, rgba(252,58,113,1) 80%, rgba(252,176,69,1) 100%)';

    toast(text, background)
}
$toastWarning = function(text) {
    const background = 'linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(252,176,69,1) 38%)';

    toast(text, background)
}
$toastInfo = function(text) {
    const background = 'linear-gradient(90deg, rgba(58,73,180,1) 0%, rgba(69,226,252,1) 38%)';

    toast(text, background)
}

function toast(text, background = null) {
    if(background == null) {
        background = 'linear-gradient(to right, #00b09b, #96c93d)';
    }

    Toastify({
        text: text,
        close: true,
        duration: 2500,
        style: {
            background: background,
        },
    }).showToast();
}
