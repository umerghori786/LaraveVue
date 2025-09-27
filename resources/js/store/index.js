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
      state.token  = token;
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
    }
    
  },
  getters:{

    
  }
})