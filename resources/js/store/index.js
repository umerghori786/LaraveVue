import {createStore} from "vuex";
export default  createStore({
  state: {
      
      isAuthenticated : false,
      token : localStorage.getItem('token') || [],
  },
  mutations: {
    
    updateAuthenticationStatus(state,status)
    {
      state.isAuthenticated = status
    },
    setAuthToken(state,token)
    { 
      window.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
      state.token  = token;
    },
    resetAuth(state)
    {
      state.token = null;
      state.isAuthenticated = false;
    }
    
  },
  actions: {
    
    checkAuthenticationStatus({commit},status)
    {
      commit('updateAuthenticationStatus',status)
    },
    getAuthToken({commit},token)
    {
      commit('setAuthToken',token);
      localStorage.setItem('token',token)
    },
    checkAuthenticationStatusOnLoad({commit})
    {
      const req = axios.get(`/api/user/checkauth`)
                        .then((response)=>{
                          commit('updateAuthenticationStatus',response.data.status)
                        })
    },
    logoutUser({commit})
    {
      commit('resetAuth');
      localStorage.removeItem('token')
      delete axios.defaults.headers.common['Authorization']
    }
    
  },
  getters:{

    
  }
})