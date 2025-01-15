<template>
  <div id="ir-ao-conteudo">
    <ul>
      <li>
        <a accesskey="1" href="#inicio-conteudo">Ir para o conteúdo <span>1</span></a>
      </li>
    </ul>
  </div>
</template>

<style scoped>
#ir-ao-conteudo {
  padding: 12px 14px 10px 10px;
  position: absolute;
  top: -60px;
  left: calc((100vw - 960px) / 2);
  background: #00b1aa;
  border: 1px solid white;
  border-top: none;
  border-bottom-left-radius: 8px;
  border-bottom-right-radius: 8px;
  -webkit-transition: top 1s ease-out;
  transition: top 1s ease-out;
  z-index: 100;
}

#ir-ao-conteudo:focus-within {
  position: absolute;
  top: 0px;
  -webkit-transition: top 0.5s ease-in;
  transition: top 0.5s ease-in;
}

#ir-ao-conteudo ul {
  margin: 0;
  padding-left: 0;
}

#ir-ao-conteudo li {
  display: inline-block;
  margin-left: 4px !important;
}

#ir-ao-conteudo a {
    border-radius: 5px;
  font-weight: 600;
  font-size: 1.4rem;
  color: #fff;
  padding: 4px 8px;
  outline-style: solid;
  outline-color: #e2358b;
}

#ir-ao-conteudo a:focus {
  outline-width: 2px;
}

#ir-ao-conteudo span {
  padding: 0 4px;
  color: #00b1aa;
  background-color: #fff;
  font-weight: 700;
}

#ir-ao-conteudo li + li:before {
  content: "|";
  color: #fff;
  margin-right: 6px;
}

@media (max-width: 960px) {
  #ir-ao-conteudo {
    top: -150px;
    left: 0;
  }

  #ir-ao-conteudo li + li:before {
    content: none;
    margin-right: 0;
  }

  #ir-ao-conteudo a {
    display: inline-block;
    width: 200px;
  }

  #ir-ao-conteudo a span {
    float: right;
  }

  /* Clearfix */
  #ir-ao-conteudo a::after {
    clear: both;
    content: "";
    display: block;
  }
}

@media (prefers-reduced-motion: reduce) {
  #ir-ao-conteudo {
    transition-duration: 0.001ms !important;
  }
}
</style>
