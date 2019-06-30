<template>
    <div class="secondary-action-button">
        <button type="button" class="button is-danger is-outlined is-fullwidth" @click="showModal">Delete</button>

        <div class="modal" v-bind:class="{'is-active':isActive}" v-show="showModal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Delete Tag: {{tagname}}</p>
                    <button class="delete" aria-label="close" @click="close"></button>
                </header>
                <section class="modal-card-body">
                    <p>
                        You are about to permanently delete these items from your site.<br>
                        This action cannot be undone.<br>
                        <strong>"Cancle"</strong> to stop, <strong>"Delete"</strong> to delete
                    </p>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-info" @click="close">Cancel</button>
                    <form :action="this.route" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" :value="csrf">

                        <button type="submit" name="tag_delete" class="button is-danger">Delete</button>

                    </form>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "editdeletemodal",
        props: ['tagname', 'route'],

        data() {
            return {
                isOpen: false,
                isActive: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        methods: {
            showModal: function () {
                this.isActive = true;
                this.isOpen = true;
            },

            close: function () {
                this.isActive = false;
                this.isOpen = false;
            },


        }

    }

</script>

<style scoped>

</style>