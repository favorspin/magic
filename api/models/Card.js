/**
* Card.js
*
* @description :: TODO: You might write a short summary of how this model works and what it represents here.
* @docs        :: http://sailsjs.org/#!documentation/models
*/

module.exports = {

  attributes: {
        multiverseId    : { type: 'integer', unique: true },
        name            : { type: 'string'  },
        manaCost        : { type: 'string'  },
        cmc             : { type: 'integer' },
        colors          : { type: 'string'  },
        type            : { type: 'string'  },
        supertypes      : { type: 'string'  },
        types           : { type: 'string'  },
        subtypes        : { type: 'string'  },
        rarity          : { type: 'string'  },
        text            : { type: 'string'  },
        flavor          : { type: 'string'  },
        artist          : { type: 'string'  },
        number          : { type: 'string'  },
        power           : { type: 'string'  },
        toughness       : { type: 'string'  },
        loyalty         : { type: 'string'  },
        layout          : { type: 'string'  },
        variations      : { type: 'string'  },
        imageName       : { type: 'string'  },
        watermark       : { type: 'string'  },
        border          : { type: 'string'  },
        hand            : { type: 'string'  },
        life            : { type: 'string'  },
        rulings         : { type: 'string'  },
        foreignNames    : { type: 'string'  },
        printings       : { type: 'string'  },
        originalText    : { type: 'string'  },
        originalType    : { type: 'string'  },
        legalities      : { type: 'string'  },
        set             : { model: 'set' },
  }
};

