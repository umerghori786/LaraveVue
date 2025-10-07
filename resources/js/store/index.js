import {createStore} from "vuex";
export default  createStore({
  state: {
      
      isAuthenticated : false,
      token : localStorage.getItem('token') || [],
      ecommCart : JSON.parse(localStorage.getItem('ecommCart')) || [],
      ecommCartCount : JSON.parse(localStorage.getItem('ecommCart')) ? JSON.parse(localStorage.getItem('ecommCart')).length : 0
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
    },
    cartObjectMutation(state,obj)
    {
      localStorage.setItem('ecommCart',obj)
      state.ecommCart = JSON.parse(localStorage.getItem('ecommCart'))
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
    },
    cartObject({commit},cartObject)
    {
      commit('cartObjectMutation', cartObject)
    }
    
  },
  getters:{

    getCartLength(state)
    {
      return state.ecommCart ? state.ecommCart.length : 0
    }
  }
})