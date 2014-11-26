/**
 * SearchController
 *
 * @description :: Server-side logic for managing searches
 * @help        :: See http://links.sailsjs.org/docs/controllers
 */

module.exports = {

    index: function(req, res) {
        res.view();
    },

    search: function(req,res) {

        Card.find({
            like: { name: '%'+req.param('search')+'%' },
            sort: 'name'
        }).populate('set').exec(function(err, cards) {
            if(err) {
                res.badRequest('There was an error. Please try again.', 'search/index');
            } else {
                if (cards.length === 0) {
                    res.notFound({cards: null}, 'search/results');
                } else {
                    res.ok({cards: cards}, 'search/results');
                }
            }
        });
    },

    advancedSearch: function(req, res) {

        Card.find({
            or: [{
                like: { name: '%'+req.param('search')+'%' },
                like: { type: '%'+req.param('search')+'%' }
            }],
            sort: 'name'
        }).populate('set').exec(function(err, cards) {
            if(err) {
                res.badRequest('There was an error. Please try again.', 'search/index');
            } else {
                if (cards.length === 0) {
                    res.notFound({cards: null}, 'search/results');
                } else {
                    res.ok({cards: cards}, 'search/results');
                }
            }
        });
    }
};