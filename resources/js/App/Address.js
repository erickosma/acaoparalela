import {MapError} from "./Util/error/MapError";
import {Ajax} from "./Util/Ajax";
import {Form} from "./Util/Form";

export class Address {

    constructor() {
        this.ajax = new Ajax();
        this.formClass = new Form();

    }

    init() {
        let self = this;
        $('#cep').on('focusout', function (e) {
            e.preventDefault();

            if ($(this).val().length <= 0) {
                return;
            }
            self.findCep($('#form-voluntary-cep'));
        });
        //todo select2
    }

    save(form) {
        let ajax = this.ajax;
        let self = this;

        const url = this.formClass.getAction(form);
        let data = this.formClass.getFormData(form);

        ajax.postAuth(url, data,
            function (json) {
            },
            function (error) {
                self.error(error);
            });
    }

    findCep(form) {
        let ajax = this.ajax;
        let self = this;

        const url = this.formClass.getAction(form);
        let data = this.formClass.getFormData(form);
        self.load();

        ajax.postAuth(url, data,
            function (json) {
                // {"bairro": "Nova Gameleira", "cidade": "Belo Horizonte",
                // "logradouro": "Rua Vereador J\u00falio Ferreira",
                // "estado_info": {"area_km2": "586.521,235", "codigo_ibge": "31",
                // "nome": "Minas Gerais"}, "cep": "30510090",
                // "cidade_info": {"area_km2": "331,401", "codigo_ibge": "3106200"},
                // "estado": "MG"}
                $('#state').val(json.cidade);
                $('#city').val(json.estado);
                $('#cp-cep').val($('#cep').val());
                $('#address').val(json.logradouro + 'Bairro:' + json.bairro);
                self.enable();

                self.save($('#form-voluntary-address'));
            },
            function (error) {
                $('#state').val('');
                $('#city').val('');
                self.enable();

                self.error(error);
            });

    }

    error(error) {
        try {
            let map = new MapError(error);
            toastr.warning(map.error.message);
        } catch (e) {
            console.error(e)
            toastr.warning('Sorry! One unexpected error occurred');
        }
    }

    enable() {
        $('#state').prop("disabled", false);
        $('#city').prop("disabled", false);
    }

    disable() {
        $('#state').prop("disabled", true);
        $('#city').prop("disabled", true);
    }

    load() {
        this.disable();
        $('#state').val('...');
        $('#city').val('...');
    }
}
