<template>
    <header-page :title="pageTitle" />
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <span>User List</span>
                        <button class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#modalUserAdd">Add User</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr v-for="(user, index) in users" :key="index">
                                    <user :user="user" v-on:deletingUser="getAllUser()" v-on:updatingUser="showModalUpdate" />
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <modal-add-user v-on:addingUser="getAllUser()" />
        <modal-edit-user v-on:addingUser="getAllUser()" :userid="this.edit.id" :username="this.edit.name" :useremail="this.edit.email"/>
    </div>
</template>

<script>
import headerPage from "../partials/header.vue"
import user from "../partials/user.vue"
import modalAddUser from "../partials/modal_add_user.vue"
import modalEditUser from "../partials/modal_edit_user.vue"

export default {
    components: {
        headerPage,
        user,
        modalAddUser,
        modalEditUser,
    },
    data: function () {
        return {
            pageTitle: 'User List',
            users: [],
            isUpdate: false,
            edit: {
                id: '',
                name: '',
                email: '',
                password: '',
            }
        }
    },
    methods: {
        async getAllUser() {
            await axios.get('api/users')
                .then(response => {
                    this.users = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        showModalUpdate(id, name, email) {
            this.edit.id = id;
            this.edit.name = name;
            this.edit.email = email;
        }
    },
    created() {
        this.getAllUser();
    }
}
</script>
<style lang="css">
@import "../../../../css/admin/app.css";
</style>