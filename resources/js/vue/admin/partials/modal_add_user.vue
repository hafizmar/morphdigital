<template>
    <!-- Modal -->
    <div class="modal fade" id="modalUserAdd" tabindex="-1" aria-labelledby="modalUserAddTitle" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalUserAddTitle">Add New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="pb-2">Name :</label>
                    <input v-model="data.name" type="text" name="name" class="form-control mb-2" id="addUserName">
                    <label class="pb-2">Email :</label>
                    <input v-model="data.email" @change="checkEmail()" type="email" name="email" class="form-control mb-2"
                        id="addUserEmail">
                    <label class="pb-2">Password :</label>
                    <input v-model="data.password" type="password" name="password" class="form-control mb-2"
                        id="addUserPassword">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        @click="closingModal()">Close</button>
                    <button type="button" class="btn btn-primary" id="modalAddUserBtn" :disabled="isAvail ? false : true"
                        @click="addUser()">Add User</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => {
        return {
            data: {
                name: '',
                email: '',
                password: '',
            },
            isAvail: true,
        }
    },
    methods: {
        addUser() {
            if (this.data.name.trim() == '' || this.data.email.trim() == '' || this.data.password.trim() == '') return this.alert("Text field cannot be empty.", "Woops!", "danger");

            axios.post('api/user/store', {
                user: {
                    name: this.data.name,
                    email: this.data.email,
                    password: this.data.password,
                }
            }).then(response => {
                this.alert("User registered into the system.", "Success!", "success");
                this.$emit('addingUser');
                $('#modalUserAdd').modal('toggle');
                this.closingModal();
            }).catch(error => {
                console.log(error);
            })
        },
        async checkEmail() {
            if (this.data.email != '') {
                $('#modalAddUserBtn').text('Checking...');
                this.isAvail = false;
                await axios.post('api/user/checkemail', {
                    user: {
                        email: this.data.email,
                    }
                }).then(response => {
                    setTimeout(() => {
                        $('#modalAddUserBtn').text('Add User');
                        if (response.data) {
                            this.alert("Email is not available.", "Opps!", "danger");
                            this.isAvail = false;
                        } else {
                            this.alert("Email is available.", "Okay!", "info");
                            this.isAvail = true;
                        }
                    }, 2000);
                }).catch(error => {
                    console.log(error);
                })
            }

        },
        closingModal() {
            setTimeout(() => {
                this.data.name = '';
                this.data.email = '';
                this.data.password = '';
                this.isAvail = true;
                $('#addUserName').val('');
                $('#addUserEmail').val('');
                $('#addUserPassword').val('');
            }, 300);
        }
    }
}
</script>