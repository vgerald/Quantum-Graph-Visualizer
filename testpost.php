<?php
function PY()
{
 $p=func_get_args();
 $code=array_pop($p);
 if (count($p) % 2==1) return false;
 $precode='';
 for ($i=0;$i<count($p);$i+=2) $precode.=$p[$i]." = json.loads('".json_encode($p[$i+1])."')\n";
 $pyt=tempnam('/tmp','pyt');
 file_put_contents($pyt,"import json\n".$precode.$code);
 system("python {$pyt}");
 unlink($pyt);
}




if(isset($_GET['runFunction'])) // && function_exists($_GET['runFunction']))
{
//call_user_func($_GET['runFunction']);
postStatusUpdate(htmlspecialchars(urldecode($_GET["runFunction"])));
}
else
echo "Type Tweet here:";

?>

<script>
function btnclicked() {
    var search = document.getElementById('status_update').value;
    var searchEncoded = encodeURIComponent(search);
    window.location = "http://visuallynotify.com/tweetsuite/testpost.php?runFunction=" + searchEncoded;
}
</script>


<input id=status_update type=text></input>
<input id=status_post type=button value='Process Tweet' onclick="btnclicked()"></input>

<?php

function postStatusUpdate($status_update){
	echo "<H3>" . $status_update . "</H3>";
	//echo "<BR> ... Processing Started successfully";
//$r=array('hovinko','ruka',6);
//$s=6;
$t = $status_update;

//PY('r',$r,'s',$s,'t',$t,<<<ENDPYTHON
PY('t',$t,<<<ENDPYTHON

#print('This is python 3.3 code. Looks like included in PHP :)');
#s=s+42
#print(r,' : ',s,' : ',t)


import nltk


def get_words_in_tweets(tweets): 
    all_words = [] 
    for (words, sentiment) in tweets: 
      all_words.extend(words) 
    return all_words

def get_word_features(wordlist): 
    wordlist = nltk.FreqDist(wordlist)
    word_features = wordlist.keys() 
    return word_features


' twitter sentiment analysis'
' set up training set'
pos_tweets= [('I love this car', 'positive'), 
('This view is amazing', 'positive'), 
('I feel great this morning', 'positive'), 
('I am so excited about the concert', 'positive'), 
('He is my best friend', 'positive')]

neg_tweets = [('I do not like this car', 'negative'), 
('This view is horrible', 'negative'), 
('I feel tired this morning', 'negative'), 
('I am not looking forward to the concert', 'negative'), 
('He is my enemy', 'negative')] 

tweets = []

for (words, sentiment) in pos_tweets + neg_tweets: 
    words_filtered = [e.lower() for e in words.split() if len(e) >= 3]  
    tweets.append((words_filtered, sentiment))


word_features = list(get_word_features(get_words_in_tweets(tweets)))
#print (word_features)

 
def extract_features(document): 
    document_words = set(document) 
    features = {} 
    for word in word_features: 
        features['contains(%s)' % word] = (word in document_words) 
        return features


training_set = nltk.classify.apply_features(extract_features, tweets)
#print(training_set)
classifier = nltk.classify.NaiveBayesClassifier.train(training_set)
#print(classifier)
#tweet = 'Larry is a great person ' 
tweet = t;
result= classifier.classify(extract_features(tweet.split()))

print('<BR><BR><BR>')

print('Sentiment ::\t\t\t<b>' + result + '</b>')

print('<BR><BR><BR>')


ENDPYTHON
); 
//echo "This is PHP code again\n";
}

?>