<div>
  <h1>Question 2</h1>
  <div id="result_1"></div>
  <div id="result_2"></div>
  <div id="result_challenge"></div>

  <script>
    // Question 2
    function get_schemes(htmlString) {
      const schemeAttributes = [];

      const tempElement = document.createElement('div');
      tempElement.innerHTML = htmlString;

      function recusive(element) {
        if (element.nodeType === Node.ELEMENT_NODE) {
          if (element.attributes) {
            for (let i = 0; i < element.attributes.length; i++) {
              const attribute = element.attributes[i];
              if (attribute.name.startsWith('sc-')) {
                const schemeName = attribute.name.substring(3);
                schemeAttributes.push(schemeName);
              }
            }
          }

          for (let i = 0; i < element.childNodes.length; i++) {
            recusive(element.childNodes[i]);
          }
        }
      }

      recusive(tempElement);

      return schemeAttributes;
    }

    // example test cases
    const input1 = '<i sc-root>Hello</i>';
    const input2 = '<div><div sc-rootbear title="Oh My">Hello <i sc-org>World</i></div></div>';

    result_1 = document.getElementById('result_1').innerHTML = JSON.stringify(get_schemes(input1)); // Output: ["root"]
    result_2 = document.getElementById('result_2').innerHTML = JSON.stringify(get_schemes(input2)); // Output: ["rootbear", "org"]



    
    // Question 2 Challenge
    function get_scheme_tree(htmlString) {
      const tree = {
        schemes: [],
        children: []
      };

      const tempElement = document.createElement('div');
      tempElement.innerHTML = htmlString;
      function tree_recusive(element, node) {
        if (element.nodeType === Node.ELEMENT_NODE) {
          if (element.attributes) {
            const attributesObj = {};
            for (let i = 0; i < element.attributes.length; i++) {
              const attribute = element.attributes[i];
              if (attribute.name.startsWith('sc-')) {
                const schemeName = attribute.name.substring(3);
                attributesObj[schemeName] = attribute.value;
                node.schemes.push(attributesObj);
              }
            }
          }

          for (let i = 0; i < element.childNodes.length; i++) {
            const childNode = { schemes: [], children: [] };
            node.children.push(childNode);
            tree_recusive(element.childNodes[i], childNode);
          }
        } 
        else if (element.nodeType === Node.TEXT_NODE) {
          const textContent = element.textContent.trim();
          if (textContent !== '') {
            node.text = textContent;
          }
        }
      }
      console.log([tempElement, tree]);
      tree_recusive(tempElement, tree);

      return JSON.stringify(tree, null, 2);
    }

    const input = '<div sc-prop sc-alias="" sc-type="Organization"><div sc-name="Alice">Hello <i sc-name="Wonderland">World</i></div></div>';

    // example test cases
    result = document.getElementById('result_challenge').innerHTML = JSON.stringify(get_scheme_tree(input));

  </script>
</div>