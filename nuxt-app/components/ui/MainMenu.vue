<template>
    <nav class="d-none d-lg-block">
        <ul class="menu">
            <menu-node v-for="item in menuTree" :key="item.name" :node="item">
                <ul v-if="item.children" class="submenu">
                    <menu-node
                        v-for="child in item.children"
                        :key="child.name"
                        :node="child"
                        isChild
                    >
                        <ul v-if="child.children">
                            <menu-node
                                v-for="subChild in child.children"
                                :key="subChild.name"
                                :parentPath="child.path"
                                :node="subChild"
                                isChild
                            >
                            </menu-node>
                        </ul>
                    </menu-node>
                </ul>
            </menu-node>
        </ul>
    </nav>
</template>

<script>
import MenuNode from "@/components/ui/MenuNode";

export default {
    components: {
        MenuNode,
    },
    props: {
        menuTree: {
            type: Array,
            default: () => [
                {
                    name: "Məhsullar",
                    children: [
                        {
                            name: "Tavalar",
                            children: [
                                { name: "Çugun tavalar", path: "/products" },
                                { name: "Titan tavalar", path: "/products" },
                                {
                                    name: "İnduksiya tavalar",
                                    path: "/products",
                                },
                                { name: "Daş tavalar", path: "/products" },
                            ],
                        },
                        {
                            name: "Qazanlar",
                            children: [
                                { name: "Çugun tavalar", path: "/products" },
                                { name: "Titan tavalar", path: "/products" },
                                {
                                    name: "İnduksiya tavalar",
                                    path: "/products",
                                },
                            ],
                        },
                        {
                            name: "Qəliblər",
                            children: [
                                { name: "Çugun tavalar", path: "/products" },
                                { name: "Titan tavalar", path: "/products" },
                                {
                                    name: "İnduksiya tavalar",
                                    path: "/products",
                                },
                            ],
                        },
                        {
                            name: "Böyük tavalar",
                            children: [
                                { name: "Çugun tavalar", path: "/products" },
                                { name: "Titan tavalar", path: "/products" },
                                {
                                    name: "İnduksiya tavalar",
                                    path: "/products",
                                },
                            ],
                        },
                    ],
                },
                {
                    name: "Brendər",
                    path: "/brands",
                },
                {
                    name: "Endirimlər",
                    path: "/sales",
                },
                {
                    name: "Çatdırılma və ödəmə",
                    path: "/products",
                },
                {
                    name: "Əlaqə",
                    path: "/contact",
                },
            ],
        },
    },
};
</script>
