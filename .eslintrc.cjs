module.exports = {
  root: true,
  "env": {
    "browser": true,    // <--- ESTO LE DICE A ESLINT QUE EXISTE 'window' Y 'document'
    "es2021": true,
    "node": true
  },
  extends: [
    'eslint:recommended',
    'plugin:@typescript-eslint/recommended',
  ],
  parserOptions: { ecmaVersion: 'latest' }
};
