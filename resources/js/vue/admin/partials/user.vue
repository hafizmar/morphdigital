<template>
    <td><span>{{ user.name }}</span></td>
    <td><span>{{ user.email }}</span></td>
    <td>
        <a @click="editTask()" class="btn-edit edit" data-bs-toggle="modal"
            data-bs-target="#modalEditUser"><font-awesome-icon icon="pen-to-square" /></a>
        <a @click="deleteTask()" class="btn-edit delete"><font-awesome-icon icon="trash" /></a>
    </td>
</template>

<script>

export default {
    emits: ['updatingUser', 'deletingUser'],
    props: ['user'],
    methods: {
        editTask() {
            this.$emit('updatingUser', this.user.id, this.user.name, this.user.email, this.user.password);
            $('#editUserName').val(this.user.name);
            $('#editUserEmail').val(this.user.email);
        },
        deleteTask() {
            axios.delete('api/user/' + this.user.id).then(response => {
                this.alert("Successfully delete user", "Success!", "success");
                this.$emit('deletingUser');
            }).catch(error => {
                console.log(error);
            })
        },
        async updateStatus(task) {
            // let status = task.status ? 0 : 1;
            // this.taskStatus = status;
            // task.status = status;
            // await axios.put('api/task/' + task.id, {
            //     task: {
            //         name: task.name,
            //         desc: task.desc,
            //         status: status,
            //     }
            // }).catch(error => {
            //     console.log(error);
            // })
        }
    }
}
</script>

<style scoped>
.btn-edit {
    cursor: pointer;
}

.edit {
    color: orange;
}

.delete {
    color: red;
}
</style>