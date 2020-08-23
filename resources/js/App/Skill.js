import {AppUrl} from "./Util/AppUrl";
import {Update} from "./Util/Update";

export class Skill {

    constructor() {
        this.updateFormSkill = new Update(false);
    }

    init() {
        let self = this;
        $('.skill').select2({
            //tags: true, todo sys manul
            placeholder: 'Seleciona suas habilidades',
            selectOnClose: true,
        });

        $('#selectSkill').on('select2:select', function (e) {
            self.update(e.params.data);
        });

        $('#selectSkill').on('select2:unselect', function (e) {
            self.update(e.params.data);
        });

        new MediumEditor('.editable', {
            buttonLabels: 'fontawesome',
            toolbar: {
                buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'h3']
            },
            cssClasses:{
                editor: 'Medium',
                pasteHook: 'Medium-paste-hook',
                placeholder: 'Medium-placeholder',
                clear: 'Medium-clear'
            }
        });
        /*var PRESELECTED_FRUITS = [
            { id: '1', text: 'Apple' },
            { id: '2', text: 'Mango' },
            { id: '3', text: 'Orange' }
        ];
        PRESELECTED_FRUITS.forEach(function(d) {
            var option = new Option(d.text, d.id, true, true);
            $('#selectSkill').append(option).trigger('change');
        });*/

    }

    update(data) {
        const url = new AppUrl('skillUrl').getRoute;
        let mySkill = {
            selected: data.selected,
            id: data.id,
            text: data.text
        };
        this.updateFormSkill.data(url, this.serialize(mySkill));
    }

    serialize(obj) {
        let str = [];
        for (let p in obj)
            if (obj.hasOwnProperty(p)) {
                str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
            }
        return str.join("&");
    }

}
