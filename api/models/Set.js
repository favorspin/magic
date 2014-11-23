/**
* Set.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

  attributes: {
        code            : { type: 'string' },
        name            : { type: 'string' },
        gathererCode    : { type: 'string' },
        oldCode         : { type: 'string' },
        releaseDate     : { type: 'string' },
        border          : { type: 'string' },
        type            : { type: 'string' },
        block           : { type: 'string' },
        cards           : {
            collection: 'card',
            via: 'set' }
  }
};

