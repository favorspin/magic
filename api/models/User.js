var User = {
  // Enforce model schema in the case of schemaless databases
  schema: true,

  attributes: {
        forename  : { type: 'string' },
        surname   : { type: 'string' },
        username  : {
          type: 'string',
          unique: true,
          required: true },
        email     : {
          type: 'email',
          unique: true,
          required: true },
        gender    : { type: 'integer' },
        birthday  : { type: 'date' },
        passports : {
          collection: 'Passport',
          via: 'user' }
  }
};

module.exports = User;
