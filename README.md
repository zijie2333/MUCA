# MUCA
In order to visualize our work and facilitate the usage of experiment result, we deploy an online visualization system, named Paper Map to show the information and prediction result of each paper.

In the paper map,  nodes represent paper, of which color distinguishes publication year and radius distinguishes the citation count of paper. Simultaneously, the line between the nodes represent the existence of the reference relationship between paper. As for layout, nodes are clustered by publication year, which helps visualize the citation trend of the papers more intuitively.

Through the system, user can search a specific paper they interested in by the search box, and the paper’s position will show on the Paper Map. Users can also filter the paper according to topic to generate submap by option box.

More information of each paper can be available to users by clicking the paper nodes in Paper Map system. By click effect, papers with reference relationship will be highlighted. The information panel will appears to show the essential information as well as trend and prediction result of citation count.

![image1](https://github.com/zijie2333/MUCA/raw/master/img/graph1.png)


We also visualize the cascades of papers input to neural network topology by dynamic graph, where nodes representing the infected author, with color illustrating the infected year and lines illustrating the reference relationships between authors.

![image2](https://github.com/zijie2333/MUCA/raw/master/img/graph2.jpg)
