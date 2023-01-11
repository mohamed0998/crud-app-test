<template>
  <div>
    <div class="container">
      <div class="row flex-lg-nowrap">
        <div class="col">
          <div class="col-12 col-lg-3 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="text-center px-xl-3">
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#myModal"
                  >
                    New User
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="row flex-lg-nowrap">
            <div class="col mb-3">
              <div class="e-panel card">
                <div class="card-body">
                  <div class="e-table">
                    <div class="table-responsive table-lg mt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="max-width">Nom d'utilisateur</th>
                            <th class="max-width">Nom et prénom</th>
                            <th class="sortable">Genre</th>
                            <th class="sortable">Email</th>
                            <th class="sortable">Email Pec</th>

                            <th class="sortable"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="User in users" :key="User.id">
                            <td class="text-nowrap align-middle">
                              {{ User.username }}
                            </td>
                            <td class="text-nowrap align-middle">
                              {{ User.fullname }}
                            </td>
                            <td class="text-nowrap align-middle">
                              {{ User.gender }}
                            </td>
                            <td class="text-nowrap align-middle">
                              <span>{{ User.email }}</span>
                            </td>
                            <td class="text-nowrap align-middle">
                              <span>{{ User.emailPec }}</span>
                            </td>
                            <td class="text-center align-middle">
                              <div class="btn-group align-top">
                                <button
                                  class="btn btn-sm btn-outline-secondary badge"
                                  type="button"
                                  data-bs-toggle="modal"
                                  :data-bs-target="'#MyModalEdit' + User.id"
                                >
                                  Edit
                                </button>
                                <button
                                  class="btn btn-sm btn-outline-secondary badge"
                                  type="button"
                                  @click="onClickDelete(User.userId)"
                                >
                                  delete
                                </button>
                              </div>
                            </td>
                            <div
                              class="modal fade"
                              role="dialog"
                              tabindex="-1"
                              :id="'MyModalEdit' + User.id"
                            >
                              <div
                                class="modal-dialog modal-lg"
                                role="document"
                              >
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Update User</h5>
                                    <button
                                      type="button"
                                      class="btn-close"
                                      data-bs-dismiss="modal"
                                    ></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="py-1">
                                      <form class="form" novalidate="">
                                        <div class="row">
                                          <div class="col">
                                            <div class="row">
                                              <div class="col">
                                                <div class="form-group">
                                                  <label>Nom et prénom</label>
                                                  <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="User.fullname"
                                                    placeholder="A completer"
                                                  />
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="form-group">
                                                  <label
                                                    >Nom d'utilisateur</label
                                                  >
                                                  <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="User.username"
                                                    placeholder="A completer"
                                                  />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row mt-4">
                                              <div class="col">
                                                <div class="form-group">
                                                  <label>Email</label>
                                                  <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="User.email"
                                                    placeholder="user@example.com"
                                                  />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row mt-4">
                                              <div class="col">
                                                <div class="form-group">
                                                  <label>Email Pec</label>
                                                  <input
                                                    class="form-control"
                                                    type="text"
                                                    v-model="User.emailPec"
                                                    placeholder="user@example.com"
                                                  />
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row mt-4">
                                              <div class="col">
                                                <div class="form-group">
                                                  <label>Genre</label>
                                                  <select
                                                    class="form-select"
                                                    v-model="User.gender"
                                                    aria-label="multiple select example"
                                                  >
                                                    <option>male</option>
                                                    <option>female</option>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="row mt-4">
                                          <div
                                            class="col d-flex justify-content-end"
                                          >
                                            <button
                                              class="btn btn-primary"
                                              @click="
                                                onClickUpdate(
                                                  User.userId,
                                                  User.username,
                                                  User.fullname,
                                                  User.gender,
                                                  User.email,
                                                  User.emailPec
                                                )
                                              "
                                              data-bs-dismiss="modal"
                                            >
                                              Save
                                            </button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- User Form Modal -->
          <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Create User</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                  ></button>
                </div>
                <div class="modal-body">
                  <div class="py-1">
                    <form class="form" novalidate="">
                      <div class="row">
                        <div class="col">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Nom et prénom</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  v-model="user.fullname"
                                  placeholder="A completer"
                                />
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>Nom d'utilisateur</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  v-model="user.username"
                                  placeholder="A completer"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="row mt-4">
                            <div class="col">
                              <div class="form-group">
                                <label>Email</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  v-model="user.email"
                                  placeholder="user@example.com"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="row mt-4">
                            <div class="col">
                              <div class="form-group">
                                <label>Email Pec</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  v-model="user.emailPec"
                                  placeholder="user@example.com"
                                />
                              </div>
                            </div>
                          </div>

                          <div class="row mt-4">
                            <div class="col">
                              <div class="form-group">
                                <label>Genre</label>
                                <select
                                  class="form-select"
                                  v-model="user.gender"
                                  aria-label="multiple select example"
                                >
                                  <option>male</option>
                                  <option>female</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-4">
                        <div class="col d-flex justify-content-end">
                          <button class="btn btn-primary" @click="onClickAdd">
                            Save
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useUsers } from "../store";
import { ref, onMounted } from "vue";
export default {
  name: "CrudApp",
  data() {
    return {};
  },
  setup() {
    const { users, addUser, updateUser, deleteUser, fetchUsers } = useUsers();
    const user = ref({
      username: null,
      fullname: null,
      gender: null,
      email: null,
      emailPec: null,
    });

    const clear = () => {
      user.value = { name: null, price: null };
    };
    const onClickAdd = () => {
      addUser(
        user.value.username,
        user.value.fullname,
        user.value.gender,
        user.value.email,
        user.value.emailPec
      );
      clear();
    };
    const onClickDelete = (userId) => {
      deleteUser(userId);
    };
    const onClickUpdate = (
      agentId,
      username,
      fullname,
      gender,
      email,
      emailPec
    ) => {
      updateUser(agentId, username, fullname, gender, email, emailPec);
      clear();
    };

    onMounted(() => {
      fetchUsers();
    });
    return {
      users,
      user,
      onClickAdd,
      onClickUpdate,
      onClickDelete,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
