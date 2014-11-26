/**
* Condition.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

    attributes: {

        name        : { type: 'string' },
        shorthand   : { type: 'string' },
        description : {
            type: 'string',
            size: 1000
        }
    }
};

