/**
 * set access token
 * @param state
 * @param access_token
 */
export const setAccessToken = (state, access_token) => state.access_token = access_token;

/**
 * unset access token
 * @param state
 */
export const unsetAccessToken = (state) => state.access_token = null;

/**
 * set user
 * @param state
 * @param user
 */
export const setUser = (state, user) => state.user = user;

/**
 * unset user
 * @param state
 */
export const unsetUser = (state) => state.user = {};

/**
 * set user and access token
 * @param state
 * @param user
 * @param access_token
 */
export const setUserAndAccessToken = (state, { user, access_token }) => {
  setAccessToken(state, access_token);
  setUser(state, user);
};

/**
 * unset user and access token
 * @param state
 */
export const unsetUserAndAccessToken = (state) => {
  unsetAccessToken(state);
  unsetUser(state);
};