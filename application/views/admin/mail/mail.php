<div class="card">
    <div class="card-body">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-sm alert-success">';
            echo $this->session->flashdata('success');
            echo '</div>';
        }

        if ($this->session->flashdata('failed')) {
            echo '<div class="alert alert-sm alert-warning">';
            echo $this->session->flashdata('failed');
            echo '</div>';
        }
        ?>

        <?= form_open_multipart('admin/mail/kirim'); ?>
        <div class="form-group row">
            <label for="kepada" class="col-form-label col-md-1">To :</label>
            <div class="col-md-11">
                <input type="text" name="kepada" id="Tujuan" required>
            </div>
        </div>
        <input type="hidden" value="<?= $_GET['berdasarkan']?>" name="url">
        <input type="hidden" value="" name="tujuan" class="form-control" id="valTujuan">


        <div class="form-group row">
            <label for="subject" class="col-form-label col-md-1">Subject :</label>
            <div class="col-md-11">
                <input type="text" class="form-control" id="subject" name="subjek">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-form-label col-md-1">Keterangan :</label>
            <div class="col-md-11">
                <textarea cols="30" name="isi" id="summernote" class="" placeholder="Pesan Email" rows="10"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-form-label col-md-1">Lampiran :</label>
            <div class="col-md-11">
                <input type="file" multiple class="form-control" name="lampiran[]">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Kirim</button>

        </form>
    </div>

</div>

<!-- Tagify -->
<script src="<?= base_url() ?>assets/tagify/tagify.min.js"></script>
<script src="<?= base_url() ?>assets/tagify/jQuery.tagify.min.js"></script>

<script>
    // https://www.mockaroo.com/
    (function() {

        var inputElm = document.querySelector('input[name=kepada]');

        function tagTemplate(tagData) {
            return `
        <tag title="${tagData.email}"
                contenteditable='false'
                spellcheck='false'
                tabIndex="-1"
                class="tagify__tag ${tagData.class ? tagData.class : ""}"
                ${this.getAttributes(tagData)}>
            <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
            <div>
                <div class='tagify__tag__avatar-wrap'>
                    <img onerror="this.style.visibility='hidden'" src="<?= base_url() ?>assets/image/icon.png">
                </div>
                <span class='tagify__tag-text'>${tagData.name}</span>
            </div>
        </tag>
    `
        }

        function suggestionItemTemplate(tagData) {
            return `
        <div ${this.getAttributes(tagData)}
            class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
            tabindex="0"
            role="option">
            ${ tagData.avatar ? `
            <div class='tagify__dropdown__item__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="<?= base_url() ?>assets/image/icon.png">
            </div>` : ''
            }
            <strong>${tagData.name}</strong>
            <span>${tagData.email}</span>
        </div>
    `
        }

        // initialize Tagify on the above input node reference
        var tagify = new Tagify(inputElm, {
            tagTextProp: 'name', // very important since a custom template is used with this property as text
            enforceWhitelist: true,
            skipInvalid: true, // do not remporarily add invalid tags
            dropdown: {
                closeOnSelect: false,
                enabled: 0,
                classname: 'users-list',
                searchKeys: ['name', 'email'] // very important to set by which keys to search for suggesttions when typing
            },
            templates: {
                tag: tagTemplate,
                dropdownItem: suggestionItemTemplate
            },
            whitelist: [
                <?php foreach ($anggota as $a) : ?> {
                        "value": <?= $a->value ?>,
                        "name": "<?= $a->name ?>",
                        "email": "-",
                    },
                <?php endforeach ?>
            ]
        })

        tagify.on('dropdown:show dropdown:updated', onDropdownShow)
        tagify.on('dropdown:select', onSelectSuggestion)

        var addAllSuggestionsElm;

        function onDropdownShow(e) {
            var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

            if (tagify.suggestedListItems.length > 1) {
                addAllSuggestionsElm = getAddAllSuggestionsElm();

                // insert "addAllSuggestionsElm" as the first element in the suggestions list
                dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
            }
        }

        function onSelectSuggestion(e) {
            if (e.detail.elm == addAllSuggestionsElm)
                tagify.dropdown.selectAll.call(tagify);
        }

        // create a "add all" custom suggestion element every time the dropdown changes
        function getAddAllSuggestionsElm() {
            // suggestions items should be based on "dropdownItem" template
            return tagify.parseTemplate('dropdownItem', [{
                class: "addAll",
                name: "Tambah Semua",
                email: tagify.settings.whitelist.reduce(function(remainingSuggestions, item) {
                    return tagify.isTagDuplicate(item.value) ? remainingSuggestions : remainingSuggestions + 1
                }, 0) + " Anggota"
            }])
        }
    })()


    $(document).delegate('#Tujuan', 'change', function() {
        // alert("Asdasdasd")
        let dataNa = JSON.parse($('#Tujuan').val());
        let idNa = ''
        dataNa.forEach(element => {
            idNa += `${element.value},`
        });
        $("#valTujuan").val(idNa)
    })
</script>