dependencies: (ubuntu) sudo apt install build-essential libglu1-mesa-dev libpng-dev
compile command: g++ -o main astar.cpp -lX11 -lGL -lpthread -lpng -lstdc++fs -std=c++17

for other distrobutions please follow: https://github.com/OneLoneCoder/olcPixelGameEngine/wiki/Compiling-on-Linux

How A-star works according to me:
We have nodes with distances between each. We want to visit each node and run some calculations that'll determine our shortest path.
We'll have two parameters, 'g' and 'h', to which we'll define as the local and global goals in this code.
our heuristic is the euclidean distance, and will determine how well our algorithm is performing(global value of each node).
our local value will be compared to each other node to compare eachother.
we'll also have a list (our history queue) that we'll update and rearrange our nodes that've been discovered.

PARTS:
each node has a: global, local, and parent datamember, as well as distance values to each neighbor
we have a leaderboard list that we'll use as a queue of sorts



tracing the process:
1.For all nodes around our start, we add it to the list with a global goal of infinity.

2.We take our CURRENT node's local value and add it to the distance to THAT node. If the sum is less than THAT node's local value(in this case, infinity),
then we update the neighbor's global value.

3.We give THAT node a parent, and update the local goal of THAT node with the current node's local value added to the distance between nodes.

4.We update THAT node's global goal by adding it's local goal with our heuristic(distance)

5.Once we run out of neighbors, we remove that node from our list and mark it as visted

6.Sort the list, remove nodes with neighbor's completely visted, and start with our lowest ranking node according to our list

7.Repeat this process for each node

8.If we encounter our target path and it ends up in our list, we want to remove it from the list to prevent loops, if our heuristic(distance) is 0, we've found our goal

9.Once our list is empty, we've visted all nodes, we check the node that owns our goal node. we trace their parents all the way back to the end. We now have our shortest path!