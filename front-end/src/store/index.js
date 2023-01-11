import { api } from '../axios';
import { reactive, computed } from 'vue';

export const useUsers = () => {
    const state = reactive({
        users: [],
    });
    const addUser = (username, fullname, gender, email, emailPec) => {

        state.users.push({ username: username,fullname:fullname,gender:gender, email:email,emailPec:emailPec});

            api.post('/api/v1/agent', { username: username,fullname:fullname,gender:gender, email:email,emailPec:emailPec})
                .then(() => {
                })
                .catch((error) => {
                    console.error(error);
                });
      
    };
    const updateUser = (agentId,username, fullname, gender, email, emailPec) => {
           
        
            api.put(`/api/v1/agent/${agentId}`, { username: username,fullname:fullname,gender:gender, email:email,emailPec:emailPec})
                .then(() => {})
                .catch((error) => {
                    console.error(error);
                });
            
        
    };
    const deleteUser = (agentId,id) => {
        const index = state.users.findIndex((el) => el.id === id );
            state.users.splice(index,1);
            api.delete(`/api/v1/agent/${agentId}`)
                .then(() => {})
                .catch((error) => {
                    console.error(error);
                });
                
        
    };

    const fetchUsers = () => {
        api.get('/api/v1/agents')
            .then((response) => {
                state.users = response.data.users;
                console.log(response)
            })
            .catch((error) => {
                console.error(error);
            });
    };
   

    return {
        users: computed(() => state.users),
        addUser,
        updateUser,
        deleteUser,
        fetchUsers,
        
    };
};


