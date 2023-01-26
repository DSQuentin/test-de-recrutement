/* 

Pour améliorer ce code, j'ai effectué quelques petits changements.
Tout d'abord j'ai changé la variable `kudos` en `maxKudos` afin d'indiqué que cela
représente le nombre maximal de kudos donnés dans chaque Article, plutot que le nombre
total de kudos de tous les articles. Cela me parrait plus clair.
Puis j'ai changé la variable `kudos`en `totalKudos` présent dans la fonction `calculateTotalKudos()` afin de mieux représenter le nombre total de kudos présents dans tous les articles, plutôt que le nombre donné dans un seul article. C'est le raisonnement inverse que pour le changement précédent.
Le résultat de `calculateTotalKudos()` a été mis dans une variable, puis utilisé dans `document.write(...)` plutot que d'appeler la fonction dedans.
Ces petits changements rendent le code bien plus compréhensible.
*/

const articleList = [];
const maxKudos = 5;

function calculateTotalKudos(articles) {
  let totalKudos = 0;

  for (let article of articles) {
    totalKudos += article.kudos;
  }

  return totalKudos;
}

const totalKudos = calculateTotalKudos(articleList);

document.write(`
  <p>Maximum kudos you can give to an article: ${maxKudos}</p>
  <p>Total Kudos already given across all articles: ${totalKudos}</p>
`);

/* const articleList = []; // In a real app this list would be full of articles.
var kudos = 5;

function calculateTotalKudos(articles) {
  var kudos = 0;
  
  for (let article of articles) {
    kudos += article.kudos;
  }
  
  return kudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);
 */
