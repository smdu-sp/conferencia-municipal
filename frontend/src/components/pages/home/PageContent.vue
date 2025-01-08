<script setup>
import SimpleAccordion from '@/components/SimpleAccordion.vue'

const accordionContent = [
    {
        titulo: "Entenda o que é",
        conteudo:  `<p>
                        A 8ª Conferência da Cidade de São Paulo reúne representantes do poder público, entidades da sociedade civil e população para debater propostas que busquem qualificar o munícipio com mais oportunidades, serviços e recursos para seus moradores.  As propostas apresentadas no encontro serão consolidadas em um relatório técnico que deverá ser encaminhado à comissão organizadora da 7ª Conferência Estadual das Cidades Paulistas, onde novos debates sobre as propostas das cidades do estado que, assim como São Paulo, realizaram conferências municipais serão realizados e posteriormente encaminhados no âmbito federal para elaboração de uma política pública voltada para o desenvolvimento urbano nacional.
                    </p>`
    },
    {
        titulo: "Como participar",
        conteudo:  `<p>
                        O evento é aberto ao público sem necessidade de inscrição prévia. Sujeito a lotação do espaço.
                    </p>`
    },
    {
        titulo: "Programação",
        conteudo:  `<p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur elementum tellus id urna semper, at eleifend tortor euismod. Nullam a nisl in purus cursus elementum ac vitae dui. Curabitur ullamcorper lorem ultrices, maximus dolor sit amet, elementum lacus. Vestibulum
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur elementum tellus id urna semper, at eleifend tortor euismod. Nullam a nisl in purus cursus elementum ac vitae dui. Curabitur ullamcorper lorem ultrices, maximus dolor sit amet, elementum lacus. Vestibulum
                    </p>`
    },
    {
        titulo: "Legislação",
        conteudo: ``
    },
]
</script>

<template>
    <main>
        <section class="conteudo">
            <template v-for="content, index in accordionContent" :key="`accordion-${index}`">
                <SimpleAccordion :titulo="content.titulo" :conteudo="content.conteudo"></SimpleAccordion>
            </template>
            <p>Confira <a href="#" aria-label="Publicações oficiais">aqui</a> as publicações oficiais relacionadas ao tema.</p>
        </section>
    </main>
</template>

<style scoped>
.conteudo {
    padding-bottom: 200px;
}

p {
    color: #000;
}

a {
    color: #1053FF;
}

p, a {
    text-align: left;
    font-weight: 800;
}


</style>