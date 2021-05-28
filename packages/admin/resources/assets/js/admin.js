'use strict';

/*------------------------------------------------
    Page Loader
-------------------------------------------------*/
$(window).on('load', function () {
    setTimeout(function () {
        $('.page-loader').fadeOut();
    }, 500);

    $('header.header ul.top-nav div.dropdown-menu:not(:has(*))').parent('li.dropdown').hide();
    $('aside.sidebar ul.navigation').find('li.navigation__sub').not(':has(ul > li)').hide();
    $('aside.sidebar ul.navigation').find('li.navigation__sub:has(ul > li:only-child)').on('click', 'a:first-child', (ev) => {
        window.location = $(ev.currentTarget).parent().find('ul > li > a').attr('href');
    });
    $('[data-toggle="tooltip"]').tooltip();
});

function uuidv4() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}

function showLoadingSwal(text) {
    Swal.fire({
        html: text,
        allowEscapeKey: false,
        allowOutsideClick: false,
        allowEnterKey: false,
        onBeforeOpen: () => {
            Swal.showLoading()
        }
    });
}

$(document).ajaxComplete(function(){
    $('.page-loader').fadeOut().removeClass('opacity-03');
});

var extractNumberValueFromCurrencyField;

$(document).ready(function () {
    /*------------------------------------------------
        Databyte
    -------------------------------------------------*/
    extractNumberValueFromCurrencyField = (selector, thousand_separator, decimal_separator) => {
        let field = $(selector);
        thousand_separator = thousand_separator ? thousand_separator : field.data('thousand-separator');
        decimal_separator = decimal_separator ? decimal_separator : field.data('decimal-separator');
        return field.val().split(thousand_separator).join('').replace(decimal_separator, '.');
    }

    /* Input Moneda */
    if ($('input[data-databyte-format-currency]')[0]) {
        $('input[data-databyte-format-currency]').each((index, input) => {
            var jinput = $(input);
            if (!jinput.attr('name')) {
                console.log('The next input has no NAME attribute', input);
                return;
            }
            if ($('[name='+jinput.attr('name')+']').length > 1) {
                console.log('The next NAME\'s input attribute already exists', input);
                return;
            }

            var classes = jinput.attr('class');
            var styles = jinput.attr('style');
            var placeholder = jinput.attr('placeholder');
            var required = input.hasAttribute('required') ? ('required="' + jinput.attr('required') +'" ') : false;
            if (required) {
                jinput.removeAttr('required');
            }
            var disabled = input.hasAttribute('disabled') ? ('disabled="' + jinput.attr('disabled') +'" ') : false;
            var readonly = input.hasAttribute('readonly') ? ('readonly="' + jinput.attr('readonly') +'" ') : false;
            jinput.before('<input name="' + jinput.attr('name') + '-formated" type="text" data-datatabyte-formated-field data-original-field="[name=' + jinput.attr('name') + ']" class="' + (classes ? classes:'') + '" style="' + (styles ? styles:'') + '" placeholder="' + (placeholder ? placeholder:'') + '" ' + (disabled ? disabled : '') + (readonly ? readonly : '') + '/>');

            var formatedField = $('input[name=' + jinput.attr('name') + '-formated]');
            formatedField.on('focus', function(ev) {
                var originalField = $($(this).data('original-field'));
                originalField.show();
                $(this).hide();
            }).hide();

            jinput
            .on('keypress', function(ev) {
                if (ev.which === 13) {
                    // Enter
                    ev.preventDefault();
                    var inputs = $('input:visible'),
                    this_index = inputs.index(this);
                    if (inputs.length - 1 > this_index) {
                        ev.preventDefault();
                        $(inputs[this_index + 1]);
                        return;
                    }
                }
                if (ev.which === 46) {
                    // Dot (.)
                    if ($(this).val().indexOf('.') > -1) {
                        ev.preventDefault();
                        console.log('There is already a dot (.)');
                        return;
                    }
                }
            })
            .on('blur', function(ev) {
                var formated = $('input[name=' + $(this).attr('name') + '-formated]'),
                prefix = $(this).data('prefix') ? ($(this).data('prefix') + ' ') : '',
                suffix = $(this).data('suffix') ? (' ' + $(this).data('suffix')) : '',
                decimal_separator = $(this).data('decimal-separator'),
                decimal_quantity = $(this).data('has-decimal') ? $(this).data('decimal-quantity') : 0,
                thousand_separator = $(this).data('thousand-separator');
                $(this).hide();
                var val = Number($(this).val()).toFixed(decimal_quantity),
                split = val.split('.'),
                mask = '#' + thousand_separator + '##0' + (split[1] ? (decimal_separator + '0'.repeat(split[1].length)) : '');
                if (val && val != "NaN") {
                    formated
                    .unmask()
                    .mask(mask, {reverse: true})
                    .masked(val);
                    formated
                    .val((prefix + formated.masked(val) + suffix).trim());
                }
                formated.show();
            })
            .blur();
        });
        $('select[name=currency], select[name=currency_type], select[name=currency_id]').on('change', function(e) {
            let currency = $(this).val();
            if (!currency) return;
            $.getJSON('/admin/api/currency/A_FAKE_ID_TO_REPLACE'.replace('A_FAKE_ID_TO_REPLACE', currency), {
                token: $('input[name=token]').val()
            }, function(json, textStatus) {
                    $('input[data-databyte-format-currency]')
                    .data('thousand-separator', json.data.thousand_separator)
                    .data('decimal-separator', json.data.decimal_separator)
                    .data('decimal-quantity', json.data.decimal_quantity)
                    .data('has-decimal', !!json.data.decimal_quantity)
                    .data('prefix', json.data.prefix)
                    .data('suffix', json.data.suffix)
                    .focus()
                    .blur();
            });
        });
    }

    /*------------------------------------------------
        Theme Switch
    -------------------------------------------------*/
    $('body').on('change', '.theme-switch input:radio', function () {
        var theme = $(this).val();

        $('body').attr('data-ma-theme', theme);
    });

    $('.toggle-password').click(function() {
        $(this).toggleClass('zmdi-eye zmdi-eye-off');
        var input = $($(this).siblings('input'));
        input.attr('type', input.attr('type') == 'password' ? 'text' : 'password');
    });


    /*------------------------------------------------
        Search
    -------------------------------------------------*/
    $('body').on('click', '.search__clear', function () {
        // $(this).val('');
        $(this).siblings('.search__text, .search__filter').val('');
    });

    $('body').on('click', '.search__submit', function () {
        // $(this).val('');
        $(this).closest('form').submit();
    });

    // Active Stat
    $('body').on('focus', '.search__text, .search__filter', function () {
        $(this).closest('.search').addClass('search--focus');
    });

    // Clear
    $('body').on('blur', '.search__text, .search__filter', function () {
        // $(this).val('');
        $(this).closest('.search').removeClass('search--focus');
    });


    /*------------------------------------------------
        Sidebar toggle menu
    -------------------------------------------------*/
    $('body').on('click', '.navigation__sub > a', function (e) {
        e.preventDefault();

        $(this).parent().toggleClass('navigation__sub--toggled');
        $(this).next('ul').slideToggle(250);
    });


    /*------------------------------------------------
        Form group blue line
    -------------------------------------------------*/
    if($('.form-group--float')[0]) {
        $('.form-group--float').each(function () {
            var p = $(this).find('.form-control').val()

            if(!p.length == 0) {
                $(this).find('.form-control').addClass('form-control--active');
            }
        });

        $('body').on('blur', '.form-group--float .form-control', function(){
            var i = $(this).val();

            if (i.length == 0) {
                $(this).removeClass('form-control--active');
            }
            else {
                $(this).addClass('form-control--active');
            }
        });
    }

    $('div.accordion__item div.accordion__content')
        .parent('div.collapse')
        .on('shown.bs.collapse', function(event) {
            $(event.target).siblings('div.accordion__title').find('i.zmdi').addClass('zmdi-chevron-down').removeClass('zmdi-chevron-right');
        })
        .on('hidden.bs.collapse', function(event) {
            $(event.target).siblings('div.accordion__title').find('i.zmdi').addClass('zmdi-chevron-right').removeClass('zmdi-chevron-down');
        });

    /*Hoover breadcrumbs*/
    /*
    $('.actions nav.breadcrumb').find('a:not(:first)').hide('slow');
    $('.actions nav.breadcrumb').hover(function(){
        $('header.content__title h1').stop().animate({opacity: 0.1}, 'slow')
        $('.actions nav.breadcrumb').find('a:not(:first)').stop().show('slow');
    }, function(){
        $('header.content__title h1').stop().animate({opacity: 1}, 'slow')
        $('.actions nav.breadcrumb').find('a:not(:first)').stop().hide('slow');
    });
    */

    /*------------------------------------------------
        Datatable
    -------------------------------------------------*/

    $(window).on('load', function () {
        let title = ($("select[name=server-side-data-table_length]").val() == -1) ? datatables_language.translations.sAllLengthMenu : datatables_language.translations.sLengthMenu.replace( '_MENU_', $("select[name=server-side-data-table_length]").val());
        $("select[name=server-side-data-table_length]").attr('title', title);
    });

    $(document).on("change", "select[name=server-side-data-table_length]", function(e){
        let title = ($(this).val() == -1) ? datatables_language.translations.sAllLengthMenu : datatables_language.translations.sLengthMenu.replace( '_MENU_', $(this).val());
        $(this).attr('title', title);
    });
});

function datatableFilters(create_button = false, array_radios = false, more_filters = false)
{
    let newRecordButton = '', radios = '', active, select = '', selected, disabled;

    if(create_button && Array.isArray(create_button) == false)
    {
        let url = create_button.url || create_button;
        let title = create_button.title || '';
        newRecordButton += '<div class="dataTables_buttons hidden-sm-down actions dataTables_new_record_button">';
        newRecordButton += '<a href="'+url+'" class="btn btn-success btn--icon-text custom-shadow" title="'+title+'"><i class="fa fa-plus-circle"></i></a>';
        newRecordButton += '</div>';

        $("div#new-record-button").append(newRecordButton);
    }

    if(create_button && Array.isArray(create_button))
    {
        let url, title, class_button;
        newRecordButton += '<div class="dataTables_buttons hidden-sm-down actions dataTables_new_record_button">';

        $.each(create_button, function(index, element) {
            url = element.url;
            title = element.title ? element.title : '';
            class_button = element.class ? element.class : '';
            newRecordButton += '<a href="'+url+'" class="btn '+class_button+' btn--icon-text" title="'+title+'"><i class="fa fa-plus-circle"></i></a>';
        });

        newRecordButton += '</div>';

        $("div#new-record-button").append(newRecordButton);
    }

    if(array_radios)
    {
        radios += '<div class="btn-group btn-group-toggle dataTables_buttons" data-toggle="buttons">';
        $.each(array_radios, function(index, element) {
            var title = element.title ? element.title : element.label;
            active = (element.active) ? ' active' : '';
            radios += '<label class="btn'+active+'">';
            radios += '<input type="radio" name="status" id="status_'+element.value+'" value="'+element.value+'" autocomplete="off" title="'+title+'">'+element.label;
            radios += '</label>';
        });
        radios += '</div>';

        $("div#datatable-filters").append(radios);
    }

    if(more_filters)
    {
        $.each(more_filters, function(key, data) {
            switch(data.type) {
                case "select": {
                    select = '';
                    select += '<div class="d-inline dataTables_select_search_filter" style="margin-right:10px">';
                    select += `<select name="${data.name || 'search_filter'}" id="${data.id || 'search_filter'}" class="form-control select2 hidden-search ${data.class} more-filters">`;
                    select += `<optgroup label="${data.title || ''}">`;
                    $.each(data.value, function(index, element) {
                        selected = (element.selected) ? ' selected' : '';
                        disabled = (element.disabled) ? ' disabled' : '';
                        select += '<option value="'+element.value+'" '+selected+' '+disabled+'">'+element.text+'</option>';
                    });
                    select += '</optgroup>';
                    select += '</select>';
                    select += '</div>';

                    $("div#search-filter").append(select);
                    $(`select#${data.id || 'search_filter'}`).select2({minimumResultsForSearch: Infinity, placeholder: `${data.title || ''}`});
                }
                break;
                case "button": {
                    let moreFiltersButton = '';
                    moreFiltersButton += '<div class="dataTables_buttons hidden-sm-down actions">';
                    moreFiltersButton += '<button class="btn btn-dark custom-shadow" data-toggle="modal" data-target="'+data.value.target+'" title="'+data.value.title+'">'+data.value.label+'</button>';
                    moreFiltersButton += '</div>';

                    $("div#more-filters-button").append(moreFiltersButton);
                }
                break;
                default:
            }
        });
    }

    return;
}

let timeout;

function datatableSearch(table)
{
    $(".dataTables_filter input[type='search']").off()
    .on("input", function(e) {
        let value = this.value;
        if(this.value.length > 2) {
            clearTimeout(timeout);
            timeout = setTimeout(function(){
              table.search(value).draw();
          }, 1000);
        }
        if(this.value == "") {
            timeout = table.search("").draw();
        }

        return timeout;
    })
    .on("keypress", function(e) {
        clearTimeout(timeout);
        if(e.which == 13) {
            table.search(this.value).draw();
        }
        return;
    });
}

/*Función para transformar texto a formato slug*/
const slugify = ( text ) => {
    return text
    .toString()
    .normalize( 'NFD' )
    .replace( /[\u0300-\u036f]/g, '' )
    .toLowerCase()
    .trim()
    .replace(/\s+/g, '-')
    .replace(/[^\w\-]+/g, '')
    .replace(/\-\-+/g, '-');
};

/*Función para obtener conversion*/
const currencyConversion = (list, base, rate, amount) => {
    const current_conversion_rates = list;

    const filter_result = current_conversion_rates.filter(function(x){
        return x.base_currency == base && x.rate_currency == rate;
    });

    const find_bcentral_chile = filter_result.find(element => element.source == "bcentral-chile");
    const find_openexchangerates = filter_result.find(element => element.source == "openexchangerates");
    const find_automatic = filter_result.find(element => element.source == "automatic");

    if(filter_result.length == 1){
        return filter_result[0].rate_value * amount;
    }

    if(find_bcentral_chile){
        return find_bcentral_chile.rate_value * amount;
    }

    if(find_openexchangerates){
        return find_openexchangerates.rate_value * amount;
    }

    if(find_automatic){
        return find_automatic.rate_value * amount;
    }

    return amount;
}

const currency_amount_format = (amount = 0, data_currency, min_decimals = null) => {

    let prefix, suffix, decimal_separator, decimal_quantity, thousand_separator;
    let val, split, mask, val_masked;

    prefix = data_currency.prefix ? data_currency.prefix + ' ' : '';
    suffix = data_currency.suffix ? ' ' + data_currency.suffix: '';
    decimal_separator = data_currency.decimal_separator || '';
    decimal_quantity = data_currency.decimal_quantity ? data_currency.decimal_quantity : 0;
    thousand_separator = data_currency.thousand_separator|| '';

    if(min_decimals && Number.isInteger(min_decimals) && min_decimals >= 2 && decimal_quantity < 2){
        decimal_quantity = min_decimals;
    }

    val = Number(amount).toFixed(decimal_quantity);
    split = val.split('.');
    mask = '#' + thousand_separator + '##0' + (split[1] ? (decimal_separator + '0'.repeat(split[1].length)) : '');
    val_masked = $("<input>").attr("type", "hidden").val(val).mask(mask, {reverse: true}).val();

    return (prefix + val_masked + suffix).trim();
}

// Agregar estilos CSS dependiendo los LI del header
const addCSSToNavbar = () => {
    const totalElements = $('header.header').find('li.navbar-li-item').length;
    if(totalElements > 6){
        $('header.header').addClass('extended-header-element');
        $('section.content').addClass('extended-header-element');
    }
};

addCSSToNavbar();
