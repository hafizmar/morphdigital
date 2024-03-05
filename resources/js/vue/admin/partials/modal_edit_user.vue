<template>
    <!-- Modal -->
    <div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="modalUserEditTitle" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalUserEditTitle">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="pb-2">Name :</label>
                    <input type="text" name="name" class="form-control mb-2" id="editUserName">
                    <label class="pb-2">Email :</label>
                    <input type="email" @change="checkEmail()" name="email" class="form-control mb-2" id="editUserEmail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        @click="closingModal()">Close</button>
                    <button type="button" class="btn btn-primary" id="modalEditUserBtn" :disabled="isAvail ? false : true"
                       @click="updateUser()">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['userid', 'username', 'useremail'],
    data: () => {
        return {
            data: {
                userId: '',
                userName: '',
                userEmail: '',
            },
            isAvail: true,
        }
    },
    methods: {
        updateUser() {
            this.data.userId = this.userid;
            this.data.userName = $('#editUserName').val();
            this.data.userEmail = $('#editUserEmail').val();

            if (this.data.userName.trim() == '' || this.data.userEmail.trim() == '') return this.alert("Text field cannot be empty.", "Woops!", "danger");
            axios.put('api/user/' + this.data.userId, {
                user: {
                    name: this.data.userName,
                    email: this.data.userEmail,
                }
            }).then(response => {
                this.alert("Great mind thinks alike.", "Success!", "success");
                this.$emit('addingUser');
                $('#modalEditUser').modal('toggle');
            }).catch(error => {
                console.log(error);
            })
        },
        async checkEmail() {
            this.data.userEmail = $('#editUserEmail').val();
            if (this.data.userEmail != '') {
                $('#modalEditUserBtn').text('Checking...');
                this.isAvail = false;
                await axios.post('api/user/checkemail', {
                    user: {
                        email: this.data.userEmail,
                    }
                }).then(response => {
                    setTimeout(() => {
                        $('#modalEditUserBtn').text('Save');
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
                this.data.taskName = '';
                this.data.taskDesc = '';
                $('#editUserName').val('');
                $('#editUserEmail').val('');
            }, 300);
        }
    },
}
</script>