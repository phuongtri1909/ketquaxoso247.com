document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.querySelector('.date-do-ve');
    const dateValue = dateInput.value;
    
    fetchProvinces(dateValue);
});
$(document).ready(function() {
    if ($('.date-do-ve1').length) {
        $('.date-do-ve1').on('change', function() {
            var selectedDate = $(this).val();
            $('.date-do-ve2').val(selectedDate);
            fetchProvinces(selectedDate);
        });
    }

    if ($('.date-do-ve2').length) {
        $('.date-do-ve2').on('change', function() {
            var selectedDate = $(this).val();
            $('.date-do-ve1').val(selectedDate);
            fetchProvinces(selectedDate);
        });
    }
});

function fetchProvinces(date) { 
    $.ajax({
        url: '/get-province/' + date,
        type: 'GET',
        success: function(response) {
            populateProvinces(response.provinces);
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + status + ' ' + error);
        }
    });
}

function populateProvinces(provinces) {
    const selectedProvince = window.selectedProvince;

    var provinceSelect = document.querySelector('.province-do-ve');
    var provinceSelect2 = document.querySelector('.province-do-ve2');

    if (provinceSelect) {
        provinceSelect.innerHTML = '<option value="mien-bac">Miền Bắc</option>';
    }

    if (provinceSelect2) {
        provinceSelect2.innerHTML = '<option value="mien-bac">Miền Bắc</option>';
    }

    provinces.forEach(function(province) {
        var option = document.createElement('option');
        option.value = province.slug_sc; 
        option.textContent = province.name;
        if (province.slug_sc == selectedProvince) {
            option.selected = true;
        }

        if (provinceSelect) {
            provinceSelect.appendChild(option);
        }

        if (provinceSelect2) {
            provinceSelect2.appendChild(option.cloneNode(true));
        }
    });
}