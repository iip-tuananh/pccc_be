<script>
    class PostCategory extends BaseClass {
        no_set = [];
        all_categories = @json(\App\Model\Admin\PostCategory::getForSelect(4, true));

        before(form) {
        }

        after(form) {
            if(this.categories) {
                this.all_categories = this.categories;
            }
        }


        get parent_id() {
            return this._parent_id;
        }

        set parent_id(value) {
            this._parent_id = Number(value);
        }


        get submit_data() {
            let data = {
                name: this.name,
                intro: this.intro,
                parent_id: this.parent_id,
            }
            data = jsonToFormData(data);

            return data;
        }
    }
</script>
