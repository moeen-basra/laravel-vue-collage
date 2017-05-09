/**
 * set user
 * @param commit
 * @param user
 */
export const setUser = ({ commit }, user) => commit('setUser', user);

/**
 * unset user
 * @param commit
 */
export const unsetUser = ({ commit }) => commit('unsetUser');

/**
 * set access token
 * @param commit
 * @param access_token
 */
export const setAccessToken = ({ commit }, access_token) => commit('setAccessToken', access_token);

/**
 * unset access token
 * @param commit
 */
export const unsetAccessToken = ({ commit }) => commit('unsetAccessToken');

/**
 * set user and access token
 * @param commit
 * @param access_token
 * @param user
 */
export const setUserAndAccessToken = ({ commit }, { access_token, user }) => {
  commit('setAccessToken', access_token);
  commit('setUser', user);
};

/**
 * unset user and access token
 * @param commit
 */
export const unsetUserAndAccessToken = ({ commit }) => commit('unsetUserAndAccessToken');
