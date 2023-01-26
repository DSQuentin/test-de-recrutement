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
