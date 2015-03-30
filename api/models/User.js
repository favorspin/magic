var User = {
  // Enforce model schema in the case of schemaless databases
  schema: true,

  attributes: {
        forename  : { type: 'string' },
        surname   : { type: 'string' },
        username  : {
          type: 'string',
          unique: true,
          required: true
        },
        email     : {
          type: 'email',
          unique: true,
          required: true
        },
        gender    : { type: 'integer' },
        birthday  : { type: 'date' },
        passports : {
          collection: 'Passport',
          via: 'user'
        },
          wantList      : {
          collection    : 'wantList',
          via           : 'user'
        },
        haveList        : {
            collection  : 'haveList',
            via         : 'user'
        },
        receivedMessage : {
          collection    : 'message',
          via           : 'receiver'
        },
        sentMessage     : {
          collection    : 'message',
          via           : 'sender'
        },
        receivedTrades  : {
          collection    : 'trade',
          via           : 'receiver'
        },
        sentTrades      : {
          collection    : 'trade',
          via           : 'sender'
        }
  }
};

module.exports = User;
