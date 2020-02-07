<?php

/** @noinspection SpellCheckingInspection */

/**
 * Copyright (c) 2020. >Michel Le Quer michel@mlequer.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace MLequer\Component\Typos\Provider;

use Generator;

class HomophoneTyposProvider implements TyposProviderInterface
{

    /**
     * @inheritDoc
     */
    public function generateTypos(string $word): Generator
    {
        $homophones = $this->getHomophones();
        var_dump($homophones);

        foreach ($homophones as $key => $set) {
            if (strpos($word, $key) !== false) {
                foreach ($set as $homophone) {
                    $rep = preg_replace("/$key/", $homophone, $word);
                    $rep = ($rep !== null) ? str_replace(' ', '', $rep) : $word;
                    if ($rep != $word) {
                        yield $rep;
                    }
                }
            }
        }
    }

    /**
     * @return array<array<string>> Homophones sets
     */
    private function getHomophones(): array
    {
        $wordSets = array_map(
            function ($value) {
                return explode(',', strtolower(trim($value)));
            },
            $this->homophones
        );

        $dictionary = array();

        foreach ($wordSets as $set) {
            foreach ($set as $word) {
                $dictionary[$word] = $set;
            }
        }

        return $dictionary;
    }

    /**
     * Array of homophones.
     *
     * @var array<int, string>
     */
    private $homophones = [
        'Aale, Ahle',
        'Ai, Ei',
        'Annalen, analen',
        'aß, Aas',
        'Bad, bat',
        'bald, ballt',
        'Bällen, bellen',
        'Band, bannt',
        'Beete, bete',
        'bis, Biss',
        'Block, Blog',
        'Boot, bot',
        'Boote, Bote',
        'Bug, buk',
        'Bund, bunt',
        'Chor, Korps',
        'Code, Kot',
        'das, dass',
        'dehnen, denen',
        'erhält, erhellt',
        'Fähre, faire',
        'Fälle, Felle',
        'fällt, Feld',
        'Färse, Ferse, Verse',
        'fast, fasst',
        'fetter, Vetter',
        'fiel, viel',
        'fließt, fliehst, fliest',
        'frisst, Frist',
        'Fühler, Phyla',
        'Geld, gellt',
        'Gewand, gewandt',
        'Grad, Grat',
        'Graf, Graph',
        'Halt, hallt',
        'hallte, halte',
        'hält, Held, hellt',
        'Hämmer, Hemmer',
        'hängst, Hengst',
        'harrt, hart',
        'hasst, hast',
        'Häute, heute',
        'Heer, hehr, her',
        'Hemd, hemmt',
        'hohl, hol',
        'Hund, Hunt',
        'isst, ist',
        'kannte, Kante',
        'konnten, Konten',
        'Kuh, Coup',
        'küsste, Küste',
        'Laib, Leib',
        'Laie, Leihe',
        'laichen, Leichen',
        'lasst, Last',
        'läuten, Leuten',
        'Lärche, Lerche',
        'Leere, Lehre',
        'leeren, lehren',
        'Leerstelle, Lehrstelle',
        'Leid, leiht',
        'Lid, Lied',
        'lies, ließ',
        'liest, least',
        'Mahl, Mal',
        'Mähre, Märe, Meere',
        'mahlen, malen',
        'man, Mann',
        'Märkte, merkte',
        'Meer, mehr',
        'Miene, Mine',
        'misst, Mist',
        'Mohr, Moor',
        'mühten, Mythen',
        'Mund, Munt',
        'Nachnahme, Nachname',
        'nahmen, Namen',
        'packt, Pakt',
        'pisste, Piste',
        'rächen, Rechen',
        'rächt, Recht',
        'Rad, Rat',
        'Rain, rein',
        'Rede, Reede',
        'Reis, reiß',
        'reist, reißt',
        'ruhte, Rute, Route',
        'säen, sähen',
        'Sämann, Seemann',
        'Sätzen, setzen',
        'Saite, Seite',
        'seid, seit',
        'schafft, Schaft',
        'schallten, schalten',
        'Schänke, schenke',
        'schellte, Schelte',
        'Schlächter, schlechter',
        'Schlämme, schlemme',
        'Schwälle, Schwelle',
        'Schwämme, Schwemme',
        'Seen, sehen',
        'seid, seiht, seit',
        'sie, sieh',
        'Siegel, Sigel',
        'Sohle, Sole',
        'Sold, sollt',
        'späht, spät',
        'Stadt, statt',
        'Städte, Stätte',
        'Ställe, Stelle',
        'starrt, Start',
        'stehlen, Stelen',
        'stiehl, Stiel, Stil',
        'Tod, tot',
        'Trend, trennt',
        'Uhrzeit, Urzeit',
        'Verband, verbannt',
        'Verben, werben',
        'verließ, Verlies',
        'verwaist, verweist',
        'Villen, Willen',
        'Waage, vage',
        'Waagen, wagen',
        'Wahl, Wal',
        'wahr, war',
        'wahre, Ware',
        'Waise, Weise',
        'Wald, wallt',
        'Wälle, Welle',
        'Wände, Wende',
        'Weck, weg',
        'Wehr, wer',
        'wehrt, Wert',
        'weiht, weit',
        'weis, weiß',
        'weist, weißt',
        'wieder, wider',
        'wird, Wirt',
        'Zunahme, Zuname',
        'accept,except',
        'acclamation,acclimation',
        'acts,ax,axe',
        'adolescence,adolescents',
        'aeration,erration',
        'aerie,airy',
        'affect,effect',
        'aid,aide',
        'ail,ale',
        'air,heir,err,ere',
        "aisle,isle,I'll",
        'all,awl',
        'allowed,aloud',
        'allude,elude',
        'altar,alter',
        'appose,oppose',
        'arc,ark',
        'are,our',
        'ascent,assent',
        'ate,eight',
        'away,aweigh',
        'aye,eye',
        'bade,bayed',
        'bail,bale',
        'bait,bate',
        'bald,bawled,balled',
        'ball,bawl',
        'band,banned',
        'bard,barred',
        'bare,bear',
        'baron,barren',
        'base,bass',
        'based,baste',
        'bazaar,bizarre',
        'be,bee',
        'beach,beech',
        'bean,been',
        'beat,beet',
        'been,bin',
        'beer,bier',
        'bell,belle',
        'berry,bury',
        'berth,birth',
        'better,bettor',
        'bight,bite',
        'billed,build',
        'bird,burred',
        'blew,blue',
        'boar,bore,boor',
        'board,bored',
        'boarder,border',
        'bode,bowed',
        'bold,bowled',
        'bolder,boulder,bowlder',
        'bole,bowl',
        'boos,booze',
        'bough,bow',
        'boy,buoy',
        'braid,brayed',
        'braise,braze,brays,braize',
        'brake,break',
        'breach,breech',
        'bread,bred',
        'brewed,brood',
        'brews,bruise',
        'bridal,bridle',
        'burro,burrow',
        'bus,buss',
        'bused,bust',
        'but,butt',
        'buy,bye,by',
        'cache,cash',
        'callous,callus',
        "can't,cant",
        'cannon,canon',
        'canter,cantor',
        'carat,carrot,caret',
        'caries,carries',
        'cast,caste',
        'cede,seed',
        'cell,sell',
        'cellar,seller',
        'censor,sensor',
        'cent,sent,scent',
        'cents,sense,scents',
        'cereal,serial',
        'cession,session',
        'chaise,chase',
        'chalk,chock',
        'chance,chants',
        'chased,chaste',
        'cheap,cheep',
        'chews,choose',
        'chic,sheik',
        'choir,quire',
        'chord,cored,cord',
        'chute,shoot',
        'cite,site,sight',
        'clause,claws',
        'click,clique',
        'close,clothes',
        'coal,cole',
        'coaled,cold',
        'coarse,course',
        'coated,coded',
        'cocks,cox',
        'complement,compliment',
        'contingence,contingents',
        'coo,coup',
        'coop,coupe',
        'correspondence,correspondents',
        'cosign,cosine',
        'council,counsel',
        'councilor,counselor',
        'creak,creek',
        'crewed,crude',
        'crews,cruise',
        'cue,queue',
        'currant,current',
        'curser,cursor',
        'dam,damn',
        'Dane,deign',
        'days,daze',
        'dear,deer',
        'dense,dents',
        'dependence,dependents',
        'dew,due,do',
        'die,dye',
        'dire,dyer',
        'discreet,discrete',
        'doe,dough',
        'does,doze,doughs',
        'done,dun',
        'dual,duel',
        'ducked,duct',
        'earn,urn',
        'either,ether',
        'emigrant,immigrant',
        'eutopia,utopia',
        'ewe,you,yew',
        "eyed,I'd",
        'fain,feign',
        'faint,feint',
        'fair,fare',
        'fairy,ferry',
        'fate,fete',
        'faze,phase',
        'feat,feet',
        'feudal,futile',
        'find,fined',
        'finish,Finnish',
        'fir,fur',
        'flair,flare',
        'flea,flee',
        'flecks,flex',
        'flew,flue',
        'flour,flower',
        'foaled,fold',
        'for,four,fore',
        'forego,forgo',
        'foreword,forward',
        'forth,fourth',
        'foul,fowl',
        'frees,frieze,freeze',
        'friar,fryer',
        'gage,gauge',
        'gait,gate',
        'gel,jell',
        'gene,jean',
        'gild,guild',
        'gneiss,nice',
        'gored,gourd',
        'grade,grayed,greyed',
        'grate,great',
        'grays,greys,graze',
        'grisly,grizzly',
        'groan,grown',
        'guessed,guest',
        'guide,guyed',
        'guise,guys',
        'hail,hale',
        'hair,hare',
        'hairy,harry',
        'hall,haul',
        'halve,have',
        'hangar,hanger',
        'hay,hey',
        'hays,haze',
        "he'd,heed",
        "he'll,heel,heal",
        'hear,here',
        'heard,herd',
        'heated,heeded',
        'hew,hue',
        'hi,high',
        'higher,hire',
        'him,hymn',
        'ho,hoe',
        'hoar,whore',
        'hoard,horde',
        'hoarse,horse',
        'hoes,hose',
        'hold,holed',
        'hole,whole',
        'holey,wholly,holy',
        'hostel,hostile',
        'hour,our',
        'idle,idol',
        'immanent,imminent',
        'in,inn',
        'incidence,incidents',
        'incite,insight',
        'instance,instants',
        'intense,intents',
        'intension,intention',
        "it's,its",
        'jam,jamb',
        'knave,nave',
        'knead,need,kneed',
        'knew,new',
        'knight,night',
        'knit,nit',
        'knot,not,naught',
        'know,no',
        'knows,nose',
        'lacks,lax',
        'lade,laid',
        'lain,lane',
        'lair,layer',
        'lam,lamb',
        'laps,lapse',
        'lay,lei',
        'lays,laze',
        'leach,leech',
        'lead,led',
        'leak,leek',
        'lean,lien',
        'leased,least',
        'lends,lens',
        'lessen,lesson',
        'lesser,lessor',
        "let's,lets",
        'levee,levy',
        'liar,lyre',
        'lichen,liken',
        'lickerish,licorice',
        'lie,lye',
        'links,lynx',
        'lo,low',
        'load,lode',
        'loan,lone',
        'loch,lock',
        'locks,lox',
        'loop,loupe',
        'loos,lose',
        'lose,loose',
        'made,maid',
        'mail,male',
        'main,mane',
        'maize,maze,Mays',
        'mall,maul',
        'manner,manor',
        'marshal,martial',
        'massed,mast',
        'mat,matte',
        'mean,mien',
        'meat,mete,meet',
        'medal,mettle,meddle,metal',
        'might,mite',
        'mince,mints',
        'mind,mined',
        'miner,minor',
        'missed,mist',
        'moat,mote',
        'mood,mooed',
        'moor,more',
        'morning,mourning',
        'muscle,mussel',
        'mussed,must',
        'naval,navel',
        'nay,neigh',
        'nicks,nix',
        'none,nun',
        'oar,ore,or',
        'ode,owed',
        'oh,owe',
        'once,wants',
        'one,won',
        'oohs,ooze',
        'overseas,oversees',
        'paced,paste',
        'packed,pact',
        'pail,pale',
        'pain,pane',
        'pair,pear,pare',
        'palate,pallet,palette',
        'parish,perish',
        'passed,past',
        'patience,patients',
        'pause,paws',
        'peace,piece',
        'peak,pique,peek',
        'peal,peel',
        'pearl,purl',
        'pedal,petal,peddle',
        'peer,pier',
        'penance,pennants',
        'per,purr',
        'pi,pie',
        'plain,plane',
        'plainer,planer,planar',
        'plait,plate',
        'pleas,please',
        'pole,poll',
        'poor,pour,pore',
        'populace,populous',
        'praise,preys,prays',
        'pray,prey',
        'precedence,precedents',
        'premier,premiere',
        'presence,presents',
        'pride,pried',
        'prier,prior',
        'pries,prize',
        'prince,prints',
        'principal,principle',
        'profit,prophet',
        'rack,wrack',
        'raid,rayed',
        'rail,rale',
        'rain,rein,reign',
        'raise,raze,rays',
        'rap,wrap',
        'rapt,wrapped,wrapt',
        're-cover,recover',
        're-lay,relay',
        'read,red',
        'read,reed',
        'real,reel',
        'recede,reseed',
        'reek,wreak',
        'residence,residents',
        'rest,wrest',
        'retch,wretch',
        'rhyme,rime',
        'right,write,rite,wright',
        'ring,wring',
        'ringer,wringer',
        'rise,ryes',
        'road,rowed,rode',
        'roe,row',
        'roil,royal',
        'role,roll',
        'roomer,rumor,rumour',
        'root,route',
        'rose,rows',
        'rote,wrote',
        'rude,rued',
        'rues,ruse',
        'rung,wrung',
        'rye,wry',
        'sail,sale',
        'scene,seen',
        'sea,see',
        'seam,seem',
        'sear,seer',
        'seas,seize,sees',
        'sects,sex',
        'sew,sow,so',
        'shake,sheik',
        'shear,sheer',
        'shoe,shoo',
        'sic,sick',
        'sics,six',
        'side,sighed',
        'sighs,size',
        'sign,sine',
        'slay,sleigh',
        'sleight,slight',
        'slew,slough',
        'soar,sore',
        'soared,sword',
        'sold,soled',
        'sole,soul',
        'some,sum',
        'son,sun',
        'stair,stare',
        'stake,steak',
        'steal,steel',
        'step,steppe',
        'storey,story',
        'straight,strait',
        'suite,sweet',
        'tacked,tact',
        'tacks,tax',
        'tail,tale',
        'taper,tapir',
        'tarry,terry',
        'taught,taut',
        'tea,tee',
        'team,teem',
        'tears,tiers',
        'teas,tees,tease',
        'tense,tents',
        'than,then',
        "there,they're,their",
        'threw,through',
        'throne,thrown',
        'thyme,time',
        'tide,tied',
        'tier,tire',
        'tighten,titan',
        'to,two,too',
        'toad,towed,toed',
        'toe,tow',
        'told,tolled',
        'tracked,tract',
        'tray,trey',
        'udder,utter',
        'vain,vein,vane',
        'vale,veil',
        'vial,vile',
        'vice,vise',
        'wade,weighed',
        'wail,whale',
        'waist,waste',
        'wait,weight',
        'waive,wave',
        'waiver,waver',
        'wale,whale',
        'war,wore',
        'ward,warred',
        'ware,where,wear',
        'warn,worn',
        'wax,whacks',
        'way,whey,weigh',
        'we,wee',
        "we'd,weed",
        "we'll,wheel,weal,wheal",
        "we're,weir,were",
        "we're,whir",
        "we've,weave",
        'weak,week',
        "wearer,where're",
        'weather,whether',
        'wet,whet',
        'wheeled,wield',
        'which,witch',
        'while,wile',
        'whiled,wild',
        'whine,wine',
        'whined,wined,wind',
        'whirled,world',
        'whit,wit',
        'whither,wither',
        "who's,whose",
        'whoa,woe',
        'wood,would',
        'yack,yak',
        "yaw,your,yore,you're",
        'yoke,yolk',
        "yore,your,you're",
        "you'll,Yule",
        'aahed,odd',
        'adieu,ado',
        'ant,aunt',
        'aural,oral',
        'marry,merry',
        'rout,route',
        'seated,seeded',
        'shone,shown',
        'tidal,title',
        'trader,traitor',
        'vary and very'];
}
